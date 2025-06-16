<?php
namespace Modules\Candidate\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Candidate\Models\CandidateContact;
use Modules\Job\Events\CandidateDeleteApplied;
use Modules\Job\Models\JobCandidate;
use Modules\Language\Models\Language;
use Modules\Candidate\Models\Category;
use Modules\Candidate\Models\Candidate;
use Modules\User\Models\User;
use Modules\Candidate\Models\Resume;
use Barryvdh\DomPDF\Facade\Pdf;

class ResumeController extends AdminController
{
	public function __construct()
    {
        $this->setActiveMenu('admin/module/candidate');
        if(!is_admin()){
            $this->middleware('verified');
        }
        parent::__construct();
    }

    public function resumeBuild(Request $request) {
    	$candidate = Candidate::where('id', Auth::id())->first();
    	$user_data = $candidate->user;
    	$experience = $candidate->experience ?? [];
    	$education = $candidate->education ?? [];
    	$skills = $candidate->skills;

		if (is_string($experience)) {
		    $experience_data = json_decode($experience, true);
		} elseif (is_array($experience)) {
		    $experience_data = $experience;
		} else {
		    $experience_data = [];
		}

		if (is_string($education)) {
		    $education_data = json_decode($education, true);
		} elseif (is_array($education)) {
		    $education_data = $education;
		} else {
		    $education_data = [];
		}

    	
    	$data = [
    		'candidate' => $candidate,
    		'user' => $user_data,
    		'experience_data' => $experience_data,
    		'education_data' => $education_data,
    		'skills' => $skills
    	];

// dd($data);
        return view('Candidate::admin.resume.form', $data);
    }

    public function resumeStore(Request $request) 
    {
        if (!is_candidate()) {
            abort(403);
        }

        $row = new Resume();
        $row->candidate_id = Auth::id();
        $row->first_name = $request->input('first_name');
        $row->last_name = $request->input('last_name');
        $row->profile_picture = $request->input('profile_picture');
        $row->profile_title = $request->input('profile_title');
        $row->about = $request->input('about');
        $row->email = $request->input('email');
        $row->phone = $request->input('phone');
        $row->linkedin = $request->input('linkedin');
        $row->github = $request->input('github');
        $row->twitter = $request->input('twitter');
        $row->website = $request->input('website');

        if(empty($row->profile_picture)) {
            $row->profile_picture = "519";
        }

        // === EDUCATION
        $educations = [];
        $degrees = $request->input('degree', []);
        $institutes = $request->input('institute', []);
        $startDates = $request->input('start_date', []);
        $endDates = $request->input('end_date', []);
        $percentages = $request->input('cgpa_percentage', []);

        foreach ($degrees as $i => $degree) {
            $educations[] = [
                'from' => $startDates[$i] ?? '',
                'to' => $endDates[$i] ?? '',
                'location' => $institutes[$i] ?? '',
                'reward' => $degree,
                'information' => $percentages[$i] ?? '',
            ];
        }
        $row->education = json_encode($educations);

        // === EXPERIENCE
        $experiences = [];
        $titles = $request->input('job_title', []);
        $orgs = $request->input('organization', []);
        $jobStartDates = $request->input('job_start_date', []);
        $jobEndDates = $request->input('job_end_date', []);
        $descs = $request->input('job_desc', []);

        foreach ($titles as $i => $title) {
            $experiences[] = [
                'from' => $jobStartDates[$i] ?? '',
                'to' => $jobEndDates[$i] ?? '',
                'location' => $orgs[$i] ?? '',
                'position' => $title,
                'information' => $descs[$i] ?? '',
            ];
        }
        $row->experience = json_encode($experiences);
        $row->experience_type = $request->input('experience_type');

        // === PROJECTS
        $projects = [];
        $projectTitles = $request->input('project_title', []);
        $projectDescs = $request->input('project_desc', []);

        foreach ($projectTitles as $i => $proj) {
            $projects[] = [
                'title' => $proj,
                'description' => $projectDescs[$i] ?? '',
            ];
        }
        $row->projects = json_encode($projects);

        // === SKILLS
        $skills = [];
        $skillNames = $request->input('skill', []);
        $skillLevels = $request->input('skill_percentage', []);

        foreach ($skillNames as $i => $skill) {
            $skills[] = [
                'name' => $skill,
                'level' => $skillLevels[$i] ?? '',
            ];
        }
        $row->skills = json_encode($skills);

        $languages = [];
        $languageNames = $request->input('language', []);
        $languageLevels = $request->input('language_level', []);


        foreach ($languageNames as $i => $lang) {
            $languages[] = [
                'language' => $lang,
                'level' => $languageLevels[$i] ?? '',
            ];
        }

        $row->languages = json_encode($languages);


        $row->save();

        return redirect()->route('candidate.admin.resume.index', ['id' => $row->id])
                 ->with('success', 'Resume saved successfully!');

    }

    public function index(Request $request, $id) {
        $data = Resume::where('id', $id)->first();
        // dd($data);
        return view('Candidate::admin.resume.index', compact('data'));
    }

    public function resumeList(Request $request) {
        $data = Resume::where('candidate_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // dd($data);
        return view('Candidate::admin.resume.list', compact('data'));
    }

    public function downloadPdf($id)
    {
        $data = Resume::where('id', $id)->first();

        if (!$data) abort(404);

        $education = json_decode($data->education ?? '[]', true);
        $experiences = json_decode($data->experience ?? '[]', true);
        $skills = json_decode($data->skills ?? '[]', true);
        $languages = json_decode($data->languages ?? '[]', true);
        $projects = json_decode($data->projects ?? '[]', true);

        if(empty($data->profile_picture)) {
            $data->profile_picture = "519";
        }

        // get media file path (you might need to resolve based on media ID)
        $media = \Modules\Media\Models\MediaFile::find($data->profile_picture);
        $data->profile_picture_filename = $media ? $media->file_path : 'images/avatar.png';

        $pdf = Pdf::loadView('Candidate::admin.resume.pdf', compact('data', 'education', 'experiences', 'skills', 'languages', 'projects'));

        return $pdf->download('resume.pdf');
    }

    public function edit($id) {
        $data = Resume::where('id', $id)->first();
        // dd($data);
        return view('Candidate::admin.resume.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = Resume::findOrFail($id);
         
        $data->candidate_id = Auth::id();
        $data->first_name = $request->input('first_name');
        $data->last_name = $request->input('last_name');
        $data->profile_picture = $request->input('profile_picture');
        $data->profile_title = $request->input('profile_title');
        $data->about = $request->about;
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->linkedin = $request->input('linkedin');
        $data->github = $request->input('github');
        $data->twitter = $request->input('twitter');
        $data->website = $request->input('website');

        if(empty($data->profile_picture)) {
            $data->profile_picture = "519";
        }

        // === EDUCATION
        $educations = [];
        $degrees = $request->input('degree', []);
        $institutes = $request->input('institute', []);
        $startDates = $request->input('start_date', []);
        $endDates = $request->input('end_date', []);
        $percentages = $request->input('cgpa_percentage', []);

        foreach ($degrees as $i => $degree) {
            $educations[] = [
                'from' => $startDates[$i] ?? '',
                'to' => $endDates[$i] ?? '',
                'location' => $institutes[$i] ?? '',
                'reward' => $degree,
                'information' => $percentages[$i] ?? '',
            ];
        }
        $data->education = json_encode($educations);

       if ($request->input('experience_type') == 'fresher') {
            $data->experience = null; // or '' if it's a string column
        } else {
            $experiences = [];
            $titles = $request->input('job_title', []);
            $orgs = $request->input('organization', []);
            $jobStartDates = $request->input('job_start_date', []);
            $jobEndDates = $request->input('job_end_date', []);
            $descs = $request->input('job_desc', []);

            foreach ($titles as $i => $title) {
                $experiences[] = [
                    'from' => $jobStartDates[$i] ?? '',
                    'to' => $jobEndDates[$i] ?? '',
                    'location' => $orgs[$i] ?? '',
                    'position' => $title,
                    'information' => $descs[$i] ?? '',
                ];
            }

            $data->experience = json_encode($experiences);
        }

        $data->experience_type = $request->input('experience_type');

        // === PROJECTS
        $projects = [];
        $projectTitles = $request->input('project_title', []);
        $projectDescs = $request->input('project_desc', []);

        foreach ($projectTitles as $i => $proj) {
            $projects[] = [
                'title' => $proj,
                'description' => $projectDescs[$i] ?? '',
            ];
        }
        $data->projects = json_encode($projects);

        // === SKILLS
        $skills = [];
        $skillNames = $request->input('skill', []);
        $skillLevels = $request->input('skill_percentage', []);

        foreach ($skillNames as $i => $skill) {
            $skills[] = [
                'name' => $skill,
                'level' => $skillLevels[$i] ?? '',
            ];
        }
        $data->skills = json_encode($skills);

        $languages = [];
        $languageNames = $request->input('language', []);
        $languageLevels = $request->input('language_level', []);


        foreach ($languageNames as $i => $lang) {
            $languages[] = [
                'language' => $lang,
                'level' => $languageLevels[$i] ?? '',
            ];
        }

        $data->languages = json_encode($languages);

        $data->save();

        return redirect()->route('candidate.admin.resume.index', ['id' => $data->id])
                 ->with('success', 'Resume update successfully!');

    }

    public function bulkEdit(Request $request)
    {
        if (!is_candidate()) {
            abort(403);
        }

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
                $query = Resume::where("id", $id)->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Delete success!'));
    }


}