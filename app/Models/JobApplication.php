<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lokers_id',
        'applied_at',
        'application_file',
        'status',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loker()
    {
        return $this->belongsTo(Loker::class, 'lokers_id');
    }

    public function answers()
    {
        return $this->hasMany(ApplicantAnswer::class);
    }
}

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_application_id',
        'department_question_id',
        'selected_answer',
        'is_correct',
    ];

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }

    public function departmentQuestion()
    {
        return $this->belongsTo(DepartmentQuestion::class);
    }
}