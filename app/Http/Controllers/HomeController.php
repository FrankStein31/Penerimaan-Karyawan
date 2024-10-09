<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use App\Models\Loker;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $availableLokers = Loker::where('max_applicants', '>', function($query) {
            $query->selectRaw('COUNT(*)')
                ->from('job_applications')
                ->whereColumn('job_applications.lokers_id', 'lokers.id');
        })->count();
        $maxApplicantsLokers = Loker::whereHas('jobApplications', function($query) {
            $query->selectRaw('COUNT(*)')
                ->from('job_applications')
                ->groupBy('lokers_id')
                ->havingRaw('COUNT(*) >= lokers.max_applicants');
        })->count();
        $pendingJobApplications = JobApplication::where('status', 'pending')->count();
        $departments = Department::count(); 
        $widget = [
            'users' => $users,
            'availableLokers' => $availableLokers,
            'maxApplicantsLokers' => $maxApplicantsLokers,
            'pendingJobApplications' => $pendingJobApplications,
            'departments' => $departments,
        ];
        return view('home', compact('widget'));
    }
}
