<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\JobApplicationStatusUpdate;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    // public function index()
    // {
    //     $jobApplications = JobApplication::with('user', 'loker')->get();
    //     return view('job_applications.index', compact('jobApplications'));
    // }

    public function index(Request $request)
    {
        $departments = Department::all();
        
        $jobApplicationsQuery = JobApplication::with('user', 'loker', 'loker.department');
        
        // Filter berdasarkan departemen
        if ($request->has('department_id') && $request->department_id != 'all') {
            $jobApplicationsQuery->whereHas('loker', function ($query) use ($request) {
                $query->where('department_id', $request->department_id);
            });
        }
        
        // Filter berdasarkan status
        if ($request->has('status') && $request->status != 'all') {
            $jobApplicationsQuery->where('status', $request->status);
        }
        
        $jobApplications = $jobApplicationsQuery->get();
        
        // Define status options
        $statusOptions = [
            'pending' => 'Pending',
            'accepted' => 'Accepted',
            'rejected' => 'Rejected'
        ];
        
        return view('job_applications.index', compact('jobApplications', 'departments', 'statusOptions'));
    }

    public function show($id)
    {
        $jobApplication = JobApplication::with('user', 'loker')->findOrFail($id);
        return view('job_applications.show', compact('jobApplication'));
    }

    // public function update(Request $request, $id)
    // {
    //     $jobApplication = JobApplication::findOrFail($id);
    //     $jobApplication->status = $request->input('status');
    //     $jobApplication->save();

    //     return redirect()->route('job_applications.show', $id)->with('success', 'Pengajuan Berhasil Diproses.');
    // }
    public function update(Request $request, $id)
    {
        $jobApplication = JobApplication::findOrFail($id);
        $jobApplication->status = $request->input('status');
        $jobApplication->save();
        $jobApplication->user->notify(new JobApplicationStatusUpdate($jobApplication->status, $jobApplication->loker->name));
        return redirect()->route('job_applications.show', $id)->with('success', 'Pengajuan Berhasil Diproses dan Email Notifikasi Telah Dikirim.');
    }

    public function myApplications()
    {
        $jobApplications = JobApplication::where('user_id', Auth::id())
            ->with('loker')  // Eager load related loker data
            ->get();
        return view('job_applications.my_applications', compact('jobApplications'));
    }

    public function detail($id)
    {
        $jobApplication = JobApplication::with(['user', 'loker', 'loker.department', 'loker.position'])->findOrFail($id);
        return view('job_applications.detail', compact('jobApplication'));
    }
}
