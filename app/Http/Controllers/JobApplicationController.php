<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\JobApplicationStatusUpdate;
use App\Models\Department;
use App\Models\DepartmentQuestion;
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
        
        // Filter berdasarkan skor
        if ($request->has('score') && $request->score != 'all') {
            switch ($request->score) {
                case '10':
                    $jobApplicationsQuery->where('score', '>', 1);
                    break;
                case '20':
                    $jobApplicationsQuery->where('score', '>', 2);
                    break;
                case '30':
                    $jobApplicationsQuery->where('score', '>', 3);
                    break;
                case '40':
                    $jobApplicationsQuery->where('score', '>', 4);
                    break;
                case '50':
                    $jobApplicationsQuery->where('score', '>', 5);
                    break;
                case '60':
                    $jobApplicationsQuery->where('score', '>', 6);
                    break;
                case '70':
                    $jobApplicationsQuery->where('score', '>', 7);
                    break;
                case '80':
                    $jobApplicationsQuery->where('score', '>', 8);
                    break;
                case '90':
                    $jobApplicationsQuery->where('score', '>', 9);
                    break;
            }
        }
        
        $jobApplications = $jobApplicationsQuery->get();
        
        // Define status options
        $statusOptions = [
            'pending' => 'Pending',
            'accepted' => 'Accepted',
            'rejected' => 'Rejected'
        ];
        
        // Define score options
        $scoreOptions = [
            'all' => 'Semua Skor',
            '10' => 'Di atas 10',
            '20' => 'Di atas 20',
            '30' => 'Di atas 30',
            '40' => 'Di atas 40',
            '50' => 'Di atas 50',
            '60' => 'Di atas 60',
            '70' => 'Di atas 70',
            '80' => 'Di atas 80',
            '90' => 'Di atas 90'
        ];
        
        return view('job_applications.index', compact('jobApplications', 'departments', 'statusOptions', 'scoreOptions'));
    }

    // public function index(Request $request)
    // {
    //     $departments = Department::all();
        
    //     $jobApplicationsQuery = JobApplication::with('user', 'loker', 'loker.department');
        
    //     // Filter berdasarkan departemen
    //     if ($request->has('department_id') && $request->department_id != 'all') {
    //         $jobApplicationsQuery->whereHas('loker', function ($query) use ($request) {
    //             $query->where('department_id', $request->department_id);
    //         });
    //     }
        
    //     // Filter berdasarkan status
    //     if ($request->has('status') && $request->status != 'all') {
    //         $jobApplicationsQuery->where('status', $request->status);
    //     }
        
    //     $jobApplications = $jobApplicationsQuery->get();
        
    //     // Define status options
    //     $statusOptions = [
    //         'pending' => 'Pending',
    //         'accepted' => 'Accepted',
    //         'rejected' => 'Rejected'
    //     ];
        
    //     return view('job_applications.index', compact('jobApplications', 'departments', 'statusOptions'));
    // }

    // public function show($id)
    // {
    //     $jobApplication = JobApplication::with('user', 'loker')->findOrFail($id);
    //     return view('job_applications.show', compact('jobApplication'));
    // }

    public function show($id)
    {
        $jobApplication = JobApplication::with(['user', 'loker', 'answers.departmentQuestion'])
            ->findOrFail($id);
        
        // Group answers by correct and incorrect
        $groupedAnswers = $jobApplication->answers->groupBy('is_correct');
        $correctAnswers = $groupedAnswers[1] ?? collect();
        $incorrectAnswers = $groupedAnswers[0] ?? collect();

        return view('job_applications.show', compact('jobApplication', 'correctAnswers', 'incorrectAnswers'));
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
