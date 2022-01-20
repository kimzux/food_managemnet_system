
@extends('layouts.app')

@section('content')

       <!-- End of Topbar -->

        <!-- Begin Page Content -->
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Balance</h1>
            </div>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="card bg-light mb-3" style="max-width: 35rem;">
              <div class="card-header"><b>Add balance</b></div>
              <div class="card-body">
                <form  action="add_balance" method="post">
                    <div class="form-group row">
                        <label for="choose parent" class="col-sm-4 col-form-label">Choose parent</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="parent_name" id="parent_name">
                            @foreach ($student as $students)

                            <option value="{{ $students->id }}"> {{ $students->parent_name }} </option>
                            @endforeach
                            </select>
                        </div>
                         </div>
                         <div class="form-group row">
                            <label for="enter_balance" class="col-sm-4 col-form-label">Enter Balance</label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control" name="acc_balance" id="inputBalance" placeholder="Add Balance" required>
                            </div>
                            </div>
                  <div class="form-group row">
                    <label for="button" class="col-sm-4 col-form-label"></label>
                  <div class="col-sm-4 ">
                        <button type="submit" class="btn btn-primary" style="align-center">Add</button>
                    </div>
                     </div>
                     <?=csrf_field()?>  
                </form>
              </div>
            </div>

        


            
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
 


 



@endsection

 

 
