<?php
namespace Modules\Candidate\Admin;

use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\User\Models\UserWishList;
use Illuminate\Http\Request;
use Modules\Job\Models\Job;

class CandidateWishlistController extends AdminController
{
    protected $savedjobs;
    public function __construct()
    {
        parent::__construct();
        $this->savedjobs = UserWishList::class;
    }

    public function index(Request $request)
    {
        $wishlists = $this->savedjobs::query()
            ->where("user_wishlist.user_id", Auth::id())
            ->where("user_wishlist.object_model", 'job')
            ->orderBy('user_wishlist.id', 'desc')
            ->paginate(10);

        // Get all job IDs from wishlists
        $jobIds = $wishlists->pluck('object_id')->toArray();

        // Fetch jobs and key by ID for easy access
        $jobs = Job::whereIn('id', $jobIds)->get()->keyBy('id');

        return view('Candidate::admin.savedjobs.index', [
            'wishlists' => $wishlists,
            'jobs' => $jobs
        ]);
    }


    public function bulkEdit(Request $request)
    {
        if(!is_admin() and !is_candidate()){
            abort(403);
        }
        $this->checkPermission('candidate_manage');
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
                $wishlist = UserWishList::where('id', $id);
                if ($wishlist) {
                    $wishlist->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Delete success!'));
    }

}