<?php

namespace App;
use Food;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    
	protected $fillable = [
		'registration_number',
		'first_name',
		'last_name',
		'parent_name',
		'email',
		'classlevel',
		'phone_number',
		'image',
		'gender',
        
	];
	

	public function getFullNameAttribute()
	{
		return "{$this->first_name} {$this->last_name}";
	}

}
