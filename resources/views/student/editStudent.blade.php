@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit student</h1>
           
          </div>
          <hr class="sidebar-divider d-none d-md-block">
    
              @csrf
              @method('PATCH')
            
          <div class="bs-example">
            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="registration">
                    <div class="container">
                  <div class="card bg-light mb-3" style="max-width: 50rem;">
                    <div class="card-header"><h5><b>Admission Form</b></h5></div>
                    <div class="card-body">
                    <form method="post" action="{{ route('student.update', $student->id ) }}">
                        <div class="form-group row">
                        @csrf
              @method('PATCH')
                                <label for="inputAdmissionNumber" class="col-sm-2 col-form-label"><b>Admission Number</b></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="registration_number" id="inputAdmissionNumber" value="{{ $student->registration_number }}" placeholder="17023037010j" required>
                                </div>
                              </div>
                            <div class="form-group row">
                                <label for="inputFirstName" class="col-sm-2 col-form-label"><b>First Name</b></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="first_name" id="inputFirstName" value="{{ $student->first_name }}" placeholder="first name" required>
                                </div>
                              </div>
                             <div class="form-group row">
                              <label for="inputLastName"  class="col-sm-2 col-form-label"><b>Last Name</b></label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="last_name" id="inputLastName" value="{{ $student->last_name }} placeholder="Last Name" required>
                              </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputParentName" class="col-sm-2 col-form-label"><b>Parent Name</b></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="parent_name" id="inputParentName" value="{{ $student->parent_name }}"  placeholder="Parent Name">
                                </div>
                                 </div>
                                 <div class="form-group row">
                                  <label for="inputGender" class="col-sm-2 col-form-label"><b>gender</b></label>
                                  <div class="col-sm-8">
                                  <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                                   <label class="form-check-label" for="inlineRadio1"> {{ (old('sex') == 'male') ? 'checked' : '' }} Male</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                   <label class="form-check-label" for="inlineRadio2"> {{ (old('sex') == 'female') ? 'checked' : '' }} Female</label>
                                      </div>

                                  </div>
                                </div>
                                 <div class="form-group row">
                                            <label for="ClassLevel" class="col-sm-2 col-form-label"><b>Class</b></label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="classlevel" id="inputEducationLevel">
                                                    <option value="kindergatern" {{( $student->classlevel=== 'kindergatern') ? 'Selected' : ''}}>kindergatern</option>
                                                    <option value="grade one" {{( $student->classlevel=== 'gradeone') ? 'Selected' : ''}}>grade one</option>
                                                    <option value="grade two" {{( $student->classlevel=== 'gradetwo') ? 'Selected' : ''}}>grade two</option>
                                                    <option value="grade three" {{( $student->classlevel=== 'gradethree') ? 'Selected' : ''}}>grade three</option>
                                                    <option value="grade four" {{( $student->classlevel=== 'gradefour') ? 'Selected' : ''}}>grade four</option>
                                                    <option value="grade five" {{( $student->classlevel=== 'gradefive') ? 'Selected' : ''}}>grade five</option>
                                                    <option value="grade six" {{( $student->classlevel=== 'gradesix') ? 'Selected' : ''}}>grade six</option>
                                                    <option value="grade seven" {{( $student->classlevel=== 'gradeseven') ? 'Selected' : ''}}>grade seven</option>
                                                    <option value="grade eight" {{( $student->classlevel=== 'gradeeight') ? 'Selected' : ''}}>grade eight</option>
                                                    <option value="grade nine" {{( $student->classlevel=== 'gradenine') ? 'Selected' : ''}}>grade nine</option>
                                                    <option value="grade ten" {{( $student->classlevel=== 'gradeten') ? 'Selected' : ''}}>grade ten</option>
                                                    <option value="grade eleven" {{( $student->classlevel=== 'gradeeleven') ? 'Selected' : ''}}>grade eleven</option>
                                                    <option value="grade twelve" {{( $student->classlevel=== 'gradetwelve') ? 'Selected' : ''}}>grade twelve</option>
                                                </select>
                                            </div>
                                             </div>
                                            
        
                                               
                                                    
                                         <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label"><b>Parent Email</b></label>
                                            <div class="col-sm-8">
                                              <input type="email" class="form-control" id="inputEmail"  name="email" value="{{ $student->email }}" placeholder="Email" required>
                                            </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="inputPhoneNumber" class="col-sm-2 col-form-label"><b>Parent PhoneNumber</b></label>
                                                <div class="col-sm-8">
                                                  <input type="tel" name="phone_number"  class="form-control" id="inputPhoneNumber"  value="{{ $student->phone_number }}" placeholder="Phone Number" required >
                                                </div>
                                                 </div>
                                                 
                                                     
                                                         <div class="form-group row">
                                                            <label for="button" class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-offset-8 col-sm-8">
                                                                <button type="submit" class="btn btn-primary" autocomplete="off">update data</button>
                                                            </div>
                                                             </div>
        
                                                             <?=csrf_field()?>            
                                                   
                          </form>
                         
                    </div>
                  </div>
                  
                </div>
                <div class="tab-pane fade" id="profile">
                  <div class="card bg-light mb-3" style="max-width: 60rem">
                    <div class="card-header">Upload the Students From Excel File 
                     
                    </div>
                    <div class="card-body">
                      
                      <h5 class="card-title">Download sample here <a href='<?=asset('sample.xlsx')?>'>Download</a>
                    
                      <br><p class="card-text pt-4" >This part allows you to upload all students information.</p>
                      <form method="post" action="admission" enctype="multipart/form-data">
                      <input id="fileSelect" type="file" name="select_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" /> 
                      <div class="col-sm-offset-8 col-sm-8">
                        <hr class="sidebar-divider d-none d-md-block">
                        <button type="submit" name="submit" class="btn btn-primary" autocomplete="off">Save</button>
                    </div>
                    <?=csrf_field()?>
                  </form> 
                    </div>
                  </div>
                  
                </div>
              
            </div>
        </div> 




       


            
      <!-- End of Main Content -->

     

    </div>
    <!-- End of Content Wrapper -->


  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


 
@include('layouts.footer')


@endsection
