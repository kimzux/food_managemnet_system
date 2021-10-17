<?php

namespace App;
use Student;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    
	protected $fillable = [
        'student_id',
		'foodName',
		'foodPrice',
		'foodqnty',
		
        
	];
    public function student()
	{
		return $this->hasMany('App\Student');
	}
}
