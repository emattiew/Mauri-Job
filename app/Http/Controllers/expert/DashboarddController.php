<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\SavedJob;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class DashboarddController extends Controller
{
    public function index()
    {
         // Fetch applications
         $applications = JobApplication::with('user')->get()->unique('user_id');
    // Return the view with the necessary data
    return view('expert.dashboard', ['applications' => $applications]);
    }

    public function detail($id)
    {
        
        // Fetch job details
        $job = Job::where([
            'id' => $id,
            'status' => 1
        ])->with(['jobType', 'category'])->first();

        // If job doesn't exist, return 404
        if ($job == null) {
            abort(404);
        }

        // Check if the current user has saved this job
        $count = 0;
        if (Auth::check()) {
            $count = SavedJob::where([
                'user_id' => Auth::user()->id,
                'job_id' => $id
            ])->count();
        }

        // Fetch job applications for this job
        $applications = JobApplication::where('job_id', $id)->with('user')->get()->unique('user_id');

        // Return the view with necessary data
        return view('expert.dashboard', [
            'job' => $job,
            'count' => $count,
            'applications' => $applications
        ]);
    }
}
