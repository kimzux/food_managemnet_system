@extends('layouts.app')

@section('content')



 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>   
              <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('warning'))
   <div class="alert alert-warning alert-block"> 
  <button type="button" class="close" data-dismiss="alert">×</button>  
    <strong>{{ $message }}</strong>
</div>
@endif 
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add student</h1>
          
          </div>
          <hr class="sidebar-divider d-none d-md-block">
          <div class="bs-example">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#registration" class="nav-link active" data-toggle="tab">Registration</a>
                </li>
                <li class="nav-item">
                    <a href="#profile" class="nav-link" data-toggle="tab">Excel Registration</a>
                </li>
               
            </ul>
            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="registration">
                  <div class="card bg-light mb-3" style="max-width: 60rem;">
                    <div class="card-header"><h5><b>Admission Form</b></h5></div>
                    <div class="card-body">
                        <form class="form" action="addstudent" method="post" id="registrationForm" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label for="inputAdmissionNumber" class="col-sm-2 col-form-label"><b>Admission Number</b></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="registration_number" id="inputAdmissionNumber" placeholder="17023037010j" required>
                                </div>
                              </div>
                            <div class="form-group row">
                                <label for="inputFirstName" class="col-sm-2 col-form-label"><b>First Name</b></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="first_name" id="inputFirstName" placeholder="first name" required>
                                </div>
                              </div>
                             <div class="form-group row">
                              <label for="inputLastName"  class="col-sm-2 col-form-label"><b>Last Name</b></label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="last_name" id="inputLastName" placeholder="Last Name" required>
                              </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputParentName" class="col-sm-2 col-form-label"><b>Parent Name</b></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="parent_name" id="inputParentName" placeholder="Parent Name">
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
                                                    <option value="kindergatern">kindergatern</option>
                                                    <option value="grade one">grade one</option>
                                                    <option value="grade two">grade two</option>
                                                    <option value="grade three">grade three</option>
                                                    <option value="grade four">grade four</option>
                                                    <option value="grade five">grade five</option>
                                                    <option value="grade six">grade six</option>
                                                    <option value="grade seven">grade two</option>
                                                    <option value="grade eight">grade eight</option>
                                                    <option value="grade nine">grade nine</option>
                                                    <option value="grade ten">grade ten</option>
                                                    <option value="grade eleven">grade eleven</option>
                                                    <option value="grade twelve">grade twelve</option>
                                        
                                                </select>
                                            </div>
                                             </div>
                                            
        
                                               
                                                    
                                         <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label"><b>Parent Email</b></label>
                                            <div class="col-sm-8">
                                              <input type="email" class="form-control" id="inputEmail"  name="email" placeholder="Email" required>
                                            </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="inputPhoneNumber" class="col-sm-2 col-form-label"><b>Parent PhoneNumber</b></label>
                                                <div class="col-sm-8">
                                                  <input type="tel" name="phone_number"  class="form-control" id="inputPhoneNumber" placeholder="Phone Number" required >
                                                </div>
                                                 </div>
                                                 
                                                    
                                                         <div class="form-group row">
                                                            <label for="button" class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-offset-8 col-sm-8">
                                                                <button type="submit" class="btn btn-primary" autocomplete="off">Save</button>
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
                      
                      <h5 class="card-title">
                      <br><p class="card-text pt-4" >This part allows you to upload all students information.</p>
                      <form method="post" action="{{route('import')}}" enctype="multipart/form-data">
                      <input id="fileSelect" type="file" name="select_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" /> 
                      <div class="col-sm-offset-8 col-sm-8">
                        <hr class="sidebar-divider d-none d-md-block">
                        <button type="submit" name="submit" class="btn btn-primary" autocomplete="off">Save</button>
                    </div>
                    <?=csrf_field()?>
                  </form> 
                      </h5>
                    </div>
                  </div>
                  
                </div>
              
            </div>
        </div> 




       


            
      <!-- End of Main Content -->

     

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


 
@include('layouts.footer')


@endsection
