<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
class DashboardController extends Controller
{
   
    public function index()
    {
        $this->data['total_students'] = Student::all()->count();
        dd($this);
        // return view('home', $this->data);
    }
    
}
