<?php
namespace Modules\Job\Admin;

use App\Notifications\PrivateChannelServices;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\AdminController;
use Modules\Job\Models\JobCategory as Category;
use Modules\Job\Events\EmployerChangeApplicantsStatus;
use Modules\Job\Exports\ApplicantsExport;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobCandidate;
use Modules\Candidate\Models\CandidateCategories;
use Modules\Candidate\Models\Candidate;
use Modules\Job\Models\JobTranslation;
use Modules\Job\Models\JobType;
use Modules\Language\Models\Language;
use Modules\Location\Models\Location;
use Modules\Skill\Models\Skill;
use App\Notifications\NewJobPosted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/job');
        if(!is_admin()){
            $this->middleware('verified');
        }
    }

    public function index(Request $request)
    {
        $this->checkPermission('job_manage');
        $job_query = Job::query()->with(['location', 'category', 'company'])->orderBy('id', 'desc');
        $title = $request->query('s');
        $cate = $request->query('category_id');
        $company_id = $request->query('company_id');
        if ($cate) {
            $job_query->where('category_id', $cate);
        }
        if($company_id){
            $job_query->where('company_id', $company_id);
        }
        if ($title) {
            $job_query->where('title', 'LIKE', '%' . $title . '%');
            $job_query->orderBy('title', 'asc');
        }
        if(!is_admin()){
            $company_id = Auth::user()->company->id ?? '';
            $job_query->where('company_id', $company_id);
        }

        $data = [
            'rows'        => $job_query->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => __('Job'),
                    'url'  => 'admin/module/job'
                ],
                [
                    'name'  => __('All'),
                    'class' => 'active'
                ],
            ],
            "languages"=>Language::getActive(false),
            "locale"=>\App::getLocale(),
            'page_title'=>__("Jobs Management")
        ];
        return view('Job::admin.job.index', $data);
    }

    public function create(Request $request)
    {
        $this->checkPermission('job_manage');

        if(!is_admin()){
            if(!auth()->user()->checkJobPlan()) {
                return redirect(route('user.plan'));
            }elseif(!auth()->user()->checkJobPostingMaximum()){
                return redirect(route('job.admin.index'))->with('error', __('You posted the maximum number of jobs') );
            }
        }

        $row = new Job();
        $row->fill([
            'status' => 'publish',
        ]);
        $data = [
            'categories'        => Category::get()->toTree(),
            'job_types' => JobType::query()->where('status', 'publish')->get(),
            'job_skills' => Skill::query()->where('status', 'publish')->get(),
            'job_location'     => Location::where('status', 'publish')->get()->toTree(),
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => __('Job'),
                    'url'  => 'admin/module/job'
                ],
                [
                    'name'  => __('Add Job'),
                    'class' => 'active'
                ],
            ],
            'translation' => new JobTranslation(),
            'countries' => \Nnjeim\World\Models\Country::all()
        ];
        return view('Job::admin.job.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('job_manage');

        $row = Job::with('skills')->find($id);

        $translation = $row->translateOrOrigin($request->query('lang'));
        $company_id = Auth::user()->company->id ?? '';

        if (empty($row)) {
            return redirect(route('job.admin.index'));
        }elseif(!is_admin() && $company_id != $row->company_id){
            return redirect(route('job.admin.index'));
        }


        // Preload location relationships
        $selected_country_id = $row->country_id;
        $selected_state_id = $row->state_id;

        $states = $selected_country_id
            ? \Nnjeim\World\Models\State::where('country_id', $selected_country_id)->get()
            : collect();

        $cities = $selected_state_id
            ? \Nnjeim\World\Models\City::where('state_id', $selected_state_id)->get()
            : collect();


        $data = [
            'row'  => $row,
            'translation'  => $translation,
            'categories' => Category::query()->where('status', 'publish')->get()->toTree(),
            'job_location' => Location::query()->where('status', 'publish')->get()->toTree(),
            'job_types' => JobType::query()->where('status', 'publish')->get(),
            'job_skills' => Skill::query()->where('status', 'publish')->get(),
            'enable_multi_lang'=>true,
            'breadcrumbs' => [
                [
                    'name' => __('Job'),
                    'url'  => 'admin/module/job'
                ],
                [
                    'name'  => $row->title,
                    'class' => 'active'
                ],
            ],
            'countries' => \Nnjeim\World\Models\Country::all(),
            'states' => $states,
            'cities' => $cities,
            'selectedCountry' => $row->country_id ?? null,
            'selectedState' => $row->state_id ?? null,
            'selectedCity' => $row->location_id ?? null,

        ];
        return view('Job::admin.job.detail', $data);
    }

    public function store(Request $request, $id){
        $this->checkPermission('job_manage');

        if(!empty($request->input('salary_max')) && (int)$request->input('salary_max') > 0 && !empty($request->input('salary_min')) && (int)$request->input('salary_min') > 0) {
            $check = Validator::make($request->input(), [
                'salary_max' => 'required|gt:salary_min'
            ]);
            if (!$check->validated()) {
                return back()->withInput($request->input());
            }
        }

        if(!is_admin() and !auth()->user()->checkJobPlan()){
            return redirect(route('user.plan'));
        }

        if($id>0){
            $row = Job::find($id);
            if (empty($row)) {
                return redirect(route('job.admin.index'));
            }
        }else{

            $row = new Job();
            $row->status = "publish";
        }
        $input = $request->input();
        $attr = [
            'title',
            'content',
            'category_id',
            'thumbnail_id',
            'location_id',
            'country_id',
            'state_id',
            'company_id',
            'job_type_id',
            'expiration_date',
            'hours',
            'hours_type',
            'salary_min',
            'salary_max',
            'salary_type',
            'gender',
            'map_lat',
            'map_lng',
            'map_zoom',
            'experience',
            'is_featured',
            'is_urgent',
            'status',
            'create_user',
            'apply_type',
            'apply_link',
            'apply_email',
            'wage_agreement',
            'gallery',
            'video',
            'video_cover_id'
        ];

        if (!empty($input['wage_agreement'])){
            $input['salary_min'] = 0;
            $input['salary_max'] = 0;
        }
        $row->fillByAttr($attr, $input);
        
        if (!empty($input['title'])) {
            $baseSlug = Str::slug($input['title']);
            $slug = $baseSlug;
            $count = 1;

            // Make sure slug is unique
            while (Job::where('slug', $slug)->where('id', '!=', $row->id)->exists()) {
                $slug = $baseSlug . '-' . $count++;
            }

            $row->slug = $slug;
        }

        if(empty($request->input('create_user'))){
            $row->create_user = Auth::id();
        }
        if(empty($request->input('company_id')) && !is_admin()){
            $user = User::with('company')->find(Auth::id());
            if(!empty($user->company)){
                $row->company_id = $user->company->id;
            }
        }
        // default expiration date add if empty
        if (empty($request->input('expiration_date'))) {
            $row->expiration_date = \Carbon\Carbon::now()->addWeek()->toDateString();
        }

        if(empty($request->input('thumbnail_id'))) {
            $row->thumbnail_id = "519";
        }

        $res = $row->saveOriginOrTranslation($request->query('lang'),true);
        $row->skills()->sync($request->input('job_skills') ?? []);

        $job_category_id = $request->input('category_id');

        $job_location_id = $request->input('location_id');

        $job_country_id = $request->input('country_id');

        $job_state_id = $request->input('state_id');

        $candidate_category = CandidateCategories::where('cat_id', $job_category_id)->get();
         
        foreach ($candidate_category as $candidate) {

            $candidate_id = $candidate->origin_id;
            $candidate_data = DB::table("bc_candidates")->where('id', $candidate_id)->first();
            if (!$candidate_data) continue; // Skip if not found
            
            $candidate_location = $candidate_data->location_id;
            $candidate_country = $candidate_data->country;
            $candidate_city = $candidate_data->city;

            // Compare only if both values are not null
            $location_match = !is_null($job_location_id) && !is_null($candidate_location) && $job_location_id == $candidate_location;
            $country_match = !is_null($job_country_id) && !is_null($candidate_country) && $job_country_id == $candidate_country;
            $state_match = !is_null($job_state_id) && !is_null($candidate_city) && $job_state_id == $candidate_city;

            if ($location_match || $country_match || $state_match) {
                $user = User::find($candidate_id);

                if($user) {
                    $user_name = $user->name;
                    $user_email = $user->email;

                    $user->notify(new NewJobPosted($row));
                }
            }
            
        }

        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Job updated') );
            }else{
                return redirect(route('job.admin.edit',$row->id))->with('success', __('Job created') );
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('job_manage');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if ($action == "delete") {
             if(!is_admin()){
                return redirect()->back()->with('error', __('You are not allowed to delete the job!'));
            }
            foreach ($ids as $id) {
                $query = Job::where("id", $id);
                if (!$this->hasPermission('job_manage_others')) {
                    $company_id = Auth::user()->company->id ?? '';
                    $query->where('company_id', $company_id);
                    $this->checkPermission('job_manage');
                }
                $query->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        } else {
            foreach ($ids as $id) {
                $query = Job::where("id", $id);
                if (!$this->hasPermission('job_manage_others')) {
                    $company_id = Auth::user()->company->id ?? '';
                    $query->where('company_id', $company_id);
                    $this->checkPermission('job_manage');
                }
                $query->update(['status' => $action]);
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }

    public function allApplicants(Request $request){
        $this->setActiveMenu('admin/module/job/all-applicants');
        $candidate_id = $request->query('candidate_id');
        $rows = JobCandidate::with(['jobInfo', 'candidateInfo', 'cvInfo', 'company', 'company.getAuthor'])
            ->whereHas('jobInfo', function ($q) use($request){
                $job_id = $request->query('job_id');
                $company_id = $request->query('company_id');
                if (!$this->hasPermission('job_manage_others')) {
                    $company_id = Auth::user()->company->id ?? '';
                    $q->where('company_id', $company_id);
                }
                if( $company_id && $this->hasPermission('job_manage_others')){
                    $q->where('company_id', $company_id);
                }
                if($job_id){
                    $q->where("id", $job_id);
                }
            });

        if( $candidate_id && $this->hasPermission('job_manage_others')){
            $rows->where('candidate_id', $candidate_id);
        }

        $rows = $rows->orderBy('id', 'desc')
            ->paginate(20);
        $data = [
            'rows' => $rows
        ];
        return view('Job::admin.job.all-applicants', $data);
    }

    public function removeApplicant($id) {
        $data = JobCandidate::find($id);
        if (!$this->hasPermission('job_manage_others')) {
            $company_id = Auth::user()->company->id ?? '';
            $query->where('company_id', $company_id);
            $this->checkPermission('job_manage');
        }

        if(!empty($data)){
            $data->delete();
        }

        return redirect()->route('job.admin.allApplicants')->with('success', 'Delete applicant successfully');
    }

    public function applicantsChangeStatus($status, $id){
        $this->checkPermission('job_manage');

        $row = JobCandidate::with('jobInfo', 'jobInfo.user', 'candidateInfo', 'company', 'company.getAuthor')
            ->where('id', $id);

        if (!$this->hasPermission('job_manage_others')) {
            $row = $row->whereHas('jobInfo', function ($q){
                $company_id = Auth::user()->company->id ?? '';
                $q->where('company_id', $company_id);
            });
        };
        $row = $row->first();
        if (empty($row)){
            return redirect()->back()->with('error', __('Item not found!'));
        }
        $old_status = $row->status;
        if($status != 'approved' && $status != 'rejected' && $status != 'hired'){
            return redirect()->back()->with('error', __('Status unavailable'));
        }
        $row->status = $status;
        $row->save();
        //Send Notify and email
        if($old_status != $status) {
            event(new EmployerChangeApplicantsStatus($row));
        }

        return redirect()->back()->with('success', __('Update success!'));
    }

    public function applicantsBulkEdit(Request $request){
        $this->checkPermission('job_manage');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        foreach ($ids as $id) {
            $query = JobCandidate::with('jobInfo', 'jobInfo.user', 'candidateInfo', 'company', 'company.getAuthor')->where('id', $id);
            if (!$this->hasPermission('job_manage_others')) {
                $query = $query->whereHas('jobInfo', function ($q){
                    $company_id = Auth::user()->company->id ?? '';
                    $q->where('company_id', $company_id);
                });
            }
            $query = $query->first();
            $old_status = $query->status;
            $query->status = $action;
            $query->save();
            //Send Notify and Email
            if($old_status != $action) {
                event(new EmployerChangeApplicantsStatus($query));
            }

        }
        return redirect()->back()->with('success', __('Update success!'));
    }

    public function applicantsExport(){
        return (new ApplicantsExport())->download('applicants-' . date('M-d-Y') . '.xlsx');
    }

    public function getForSelect2(Request $request)
    {
        $q = $request->query('q');
        $query = Job::select('id', 'title as text')->where("status","publish");
        if ($q) {
            $query->where('title', 'like', '%' . $q . '%');
        }
        if(!is_admin()){
            $company_id = Auth::user()->company->id ?? '';
            $query->where('company_id', $company_id);
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }

    public function removeExpireJob($id) {
        $data = Job::find($id);
        $data->delete();

        return redirect()->route('job.admin.index')->with('success', 'Delete job successfully');
    }

    public function jobStatusChange($status, $id){
        $this->checkPermission('job_manage');

        $row = Job::where('id', $id)->first();

        if (empty($row)){
            return redirect()->back()->with('error', __('Item not found!'));
        }
        $old_status = $row->status;
        if($status != 'publish' && $status != 'draft' && $status != 'pause' && $status != 'closed'){
            return redirect()->back()->with('error', __('Status unavailable'));
        }
        $row->status = $status;
        $row->save();
        if($old_status != $status) {
            event(new EmployerChangeApplicantsStatus($row));
        }

        return redirect()->back()->with('success', __('Update success!'));
    }

    public function interviewSetup(Request $request, $id) {
         $request->validate([
            'interview_date' => 'required|date',
            'interview_time' => 'required|date_format:H:i',
        ]);

        $candidate = JobCandidate::findOrFail($id);

        $candidate->interview_date = $request->input('interview_date');
        $candidate->interview_time = $request->input('interview_time');
        $candidate->status = 'interview scheduled';
        $candidate->save();

        return redirect()->back()->with('success', __('Scheduled interview successfully!'));
    }

    public function jobOverview(Request $request) {
        $this->checkPermission('job_manage');

        $internships = Job::withCount('views', 'applications')
        ->where('create_user', Auth::id())
        ->where('job_type_id', 3)
        ->orderBy('id', 'desc')
        ->paginate(10);

        $jobs = Job::withCount('views', 'applications')
            ->where('create_user', Auth::id())
            ->where('job_type_id', '!=', 3)
            ->orderBy('id', 'desc')
            ->paginate(10);

    

        $data = [
            'internships' => $internships,
            'jobs' => $jobs,
        ];
        
        return view('Job::admin.job.overview', $data);
    }

    public function jobShortlisted(Request $request) {
       
        $this->setActiveMenu('admin/module/job/all-applicants');
        $candidate_id = $request->query('candidate_id');
        $rows = JobCandidate::with(['jobInfo', 'candidateInfo', 'cvInfo', 'company', 'company.getAuthor', 'candidateInfo.user', 'candidateInfo.skills', ])
            ->whereHas('jobInfo', function ($q) use($request){
                $job_id = $request->query('job_id');
                $company_id = $request->query('company_id');
                if (!$this->hasPermission('job_manage_others')) {
                    $company_id = Auth::user()->company->id ?? '';
                    $q->where('company_id', $company_id);
                }
                if( $company_id && $this->hasPermission('job_manage_others')){
                    $q->where('company_id', $company_id);
                }
                if($job_id){
                    $q->where("id", $job_id);
                }
            })->where('status', 'approved');

        if( $candidate_id && $this->hasPermission('job_manage_others')){
            $rows->where('candidate_id', $candidate_id);
        }
        
        $rows = $rows->orderBy('id', 'desc')
            ->paginate(20);

        $data = [
            'rows' => $rows,
        ];

        // dd($data);

        return view('Job::admin.job.shortlisted', $data);

    }

    public function jobHired(Request $request) {
       
        $this->setActiveMenu('admin/module/job/all-applicants');
        $candidate_id = $request->query('candidate_id');
        $rows = JobCandidate::with(['jobInfo', 'candidateInfo', 'cvInfo', 'company', 'company.getAuthor', 'candidateInfo.user', 'candidateInfo.skills', ])
            ->whereHas('jobInfo', function ($q) use($request){
                $job_id = $request->query('job_id');
                $company_id = $request->query('company_id');
                if (!$this->hasPermission('job_manage_others')) {
                    $company_id = Auth::user()->company->id ?? '';
                    $q->where('company_id', $company_id);
                }
                if( $company_id && $this->hasPermission('job_manage_others')){
                    $q->where('company_id', $company_id);
                }
                if($job_id){
                    $q->where("id", $job_id);
                }
            })->where('status', 'hired');

        if( $candidate_id && $this->hasPermission('job_manage_others')){
            $rows->where('candidate_id', $candidate_id);
        }
        
        $rows = $rows->orderBy('id', 'desc')
            ->paginate(20);

        $data = [
            'rows' => $rows,
        ];
        return view('Job::admin.job.hired', $data);

    }

    public function jobNotInterested(Request $request) {
       
        $this->setActiveMenu('admin/module/job/all-applicants');
        $candidate_id = $request->query('candidate_id');
        $rows = JobCandidate::with(['jobInfo', 'candidateInfo', 'cvInfo', 'company', 'company.getAuthor', 'candidateInfo.user', 'candidateInfo.skills', ])
            ->whereHas('jobInfo', function ($q) use($request){
                $job_id = $request->query('job_id');
                $company_id = $request->query('company_id');
                if (!$this->hasPermission('job_manage_others')) {
                    $company_id = Auth::user()->company->id ?? '';
                    $q->where('company_id', $company_id);
                }
                if( $company_id && $this->hasPermission('job_manage_others')){
                    $q->where('company_id', $company_id);
                }
                if($job_id){
                    $q->where("id", $job_id);
                }
            })->where('status', 'rejected');

        if( $candidate_id && $this->hasPermission('job_manage_others')){
            $rows->where('candidate_id', $candidate_id);
        }
        
        $rows = $rows->orderBy('id', 'desc')
            ->paginate(20);

        $data = [
            'rows' => $rows,
        ];
        return view('Job::admin.job.not-interested', $data);

    }

    public function applicantBulkEdit(Request $request)
    {
        if(!is_admin() and !is_employer()){
            abort(403);
        }
        $this->checkPermission('job_manage');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('No items selected!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = JobCandidate::where("id", $id)->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Delete success!'));
    }

}
