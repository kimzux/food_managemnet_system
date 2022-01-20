<?php

namespace App\Http\Controllers;
use App\Student;
use App\Student_parent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;


class ParentController extends Controller
{
    public function parents()
  {
  $student = Student::select('id', 'parent_name')->get();
  return view('student.add_balance',compact('student'));
  } //
  public function store_parent(Request $request)
  {

    $parent = new Student_parent();
    $parent->student_id = request('parent_name');
    $parent->acc_balance = request('acc_balance');
    $parent->save();
    Alert::success('Success!', 'Successfully added');
    return back();
}
}
