<?php

namespace App;
use Student;
use Illuminate\Database\Eloquent\Model;

class Student_parent extends Model
{
    protected $table = 'parent';

	protected $fillable = [
		'student_id',
		'acc_balance',
		

	];

	public function student()
	{
		// 'App\User','user_id'
		return $this->belongsTo(Student::class, 'student_id', 'id');
	}
}
