<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
    protected $table = 'parent';

	protected $fillable = [
		'student_id',
		'acc_balance',
		

	];

	public function student()
	{
		// 'App\User','user_id'

		return $this->hasOne('App\Student');
	
	
	}
}
