@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<form style="display: inline" action="addstudent" method="get">
  <button type="submit" class="btn btn-primary">Click here to add student</button>
</form>
</div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table id="student_datatable" class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name </td>
          <td>Class Level</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->first_name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->classlevel}}</td>
            <div class="d-flex">
            <td>
              <div class="d-flex">
                <a href="{{ route('student.edit', $student->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('student.destroy', $student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="ml-4 btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
              </div>
            </td>
        
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
@push('scripts')
<script>
    $('#student_datatable').DataTable({});
</script>
@endpush