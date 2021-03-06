<?php

namespace App\Http\Controllers;
use App\Student;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function store(Request $request)
    {
 
    $check=Student::where('registration_number',  request('registration_number'))->first();
    if(empty($check)){
    $student = new Student();
    $student->registration_number=request('registration_number');
    $student->first_name=request('first_name');
    $student->last_name=request('last_name');
    $student->parent_name=request('parent_name');
    $student->classlevel= request('classlevel');
    $student->email=request('email');
    $student->gender= request('gender');
    $student->phone_number=request('phone_number');
    // $student->image= request('image')->nullable;
    $student->save();
    Alert::success('Success!', 'Successfully added');
    return redirect('/student')->withSuccessMessage('Successfully added');
    // return redirect()->back()->withSuccessMessage('Successfully added');
    
    }
    else{
      Alert::warning('Warning', 'Student already exist');
      return redirect()->back()->withWarningMessage('Student already exist');
     }
  
  
     
  
    // $student = DB::table('students')->insert(request()->except('password','_token'));
  
      // DB::select('insert into students(username,email,parent_name,address,date_of_birth,d,ate_of_join,password,gender) values(?,?,?,?,?,?,?,?,?)',[$admission_number, $student_name,$student_email,$parent_name,$student_address,$date_of_birth,$date_of_join,$password,$gender]);
    // if($student){
    //  return redirect()->back()->with('success','Data Saved');
   
     
    }
    public function index()
    {
            $student = Student::all();
    
            return view('student.all', compact('student'));
    }
    public function edit($id)
{
        $student = Student::findOrFail($id);

        return view('student.editStudent', compact('student'));
}

public function update (Request $request, $id)
{

$check=Student::where('registration_number',  request('registration_number'))->first();
if(empty($check)){
$student = new Student();
$student->registration_number=request('registration_number');
$student->first_name=request('first_name');
$student->last_name=request('last_name');
$student->parent_name=request('parent_name');
$student->classlevel= request('classlevel');
$student->email=request('email');
$student->gender= request('gender');
$student->phone_number=request('phone_number');
// $student->image= request('image')->nullable;
$student->save(); 
Alert::success('Success!', 'Successfully updated');
return redirect('/student')->withSuccessMessage('Successfully updated');
// return redirect('/foodie')->with('success', 'Corona Case Data is successfully updated');
}

else{
  Alert::warning('Warning', 'you cant update student already exist');
  return redirect()->back()->withWarningMessage('student already exist');
 }
}
public function destroy($id)
{
        $student = student::findOrFail($id);
        $student->delete();
        Alert::success('Success!', 'Successfully deleted');
        return redirect('/student')->withSuccessMessage('Successfully deleted');
        // return redirect('/foodie')->with('success', 'Corona Case Data is successfully deleted');
}
public function search(Request $request)
{
    $search= $request->get('search');
    $students = Student::where('registration_number', 'like','%'.$search.'%')->get();
    return view('orders.studentSearch',['students'=> $students]);
}

}       