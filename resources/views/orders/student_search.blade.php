@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
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
            <td><a href="{{ route('student.edit', $student->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('student.destroy', $student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                  <?=csrf_field()?>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection