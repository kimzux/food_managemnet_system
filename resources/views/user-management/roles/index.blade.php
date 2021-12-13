@extends('layouts.app')

@section('content')

    <div class="container mb-4" >
        <button type="submit" data-toggle="modal" data-target="#addRoleModal" class="btn btn-primary">Click here to add role</button>
    </div>
    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            <br />
        @endif
        <table id="roles_datatable" class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-4 btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure  you want to delete?')">Delete</button>
                                    <?= csrf_field() ?>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editForm" action="{{route('roles.store')}}" method="post">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-4">
                                        <input  id="name" class="form-control" name="name" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
@endsection
@push('scripts')
    <script>
        $('#roles_datatable').DataTable({});
    </script>
@endpush
