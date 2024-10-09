<?php
// app/Models/Department.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function questions()
    {
        return $this->hasMany(DepartmentQuestion::class);
    }
}

// // app/Models/DepartmentQuestion.php
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class DepartmentQuestion extends Model
// {
//     use HasFactory;

//     protected $fillable = ['department_id', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'];

//     public function department()
//     {
//         return $this->belongsTo(Department::class);
//     }
// }