@extends('layouts.app')
@section('content')


    <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="registration">
       
               
                  

         
        </div>
    </div>
   
   
    <table id="student_table" class="table table-striped">
        <thead>
            <tr>
                <th>Admission #</th>
                <th>Name</th>
                <th>Class Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->registration_number }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->classlevel }}</td>
                    <td><a href="{{ route('order', $student->id) }}" class="btn btn-primary">choose product</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>


    @endsection


    @push('scripts')
        <script>
            $('#student_table').DataTable({});
        </script>
    @endpush
