@extends('layouts.app')
@section('content')


<div class="tab-content mt-4">
<div class="tab-pane fade show active" id="registration">
                  <div class="card bg-light mb-3" style="max-width: 40rem;">
                    <div class="card-body">
                        <form class="form" action="/studentSearch" method="get" id="registrationForm" enctype="multipart/form-data">
                        <div class="form-group row">

                                <label for="inputAdmissionNumber" class="col-sm-2 col-form-label"><b>Admission Number</b></label>
                                <div class="col-sm-8">
        
                                <input type="text" class="form-control" name="search" id="inputAdmissionNumber" placeholder="17023037010j" required><br>
                                <button type="submit" class="btn btn-primary">Search</button>
                                </div>

                              </div>

                              </div>
                              </div>
                              </div>
                              </div>
                              <?=csrf_field()?> 
                              </form>  
                              <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name </td>
          <td>Class Level</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->first_name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->classlevel}}</td>
            <td><a href="" class="btn btn-primary">add</a></td>
            <td>
               
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>


@endsection
                                                   
                                                 
                                                  