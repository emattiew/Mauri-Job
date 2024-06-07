<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\user;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JobApplicationController extends Controller
{
    public function index() {
        $applications = JobApplication::orderBy('created_at','DESC')    
                            ->with('job','user','employer')
                            ->paginate(10);
        return view('admin.job-applications.list',[
            'applications' => $applications
        ]);
    }

    public function destroy(Request $request){
        $id = $request->id;

        $jobApplication = JobApplication::find($id);

        if ($jobApplication == null) {
            session()->flash('error', 'La candidature à l\'emploi a été supprimée ou n\'a pas été trouvée.');

            return response()->json([
                'status' => false
            ]);
        }

        $jobApplication->delete();
        session()->flash('success', 'Candidature à l\'emploi supprimée avec succès.');

        return response()->json([
            'status' => true
        ]);

    }
}
