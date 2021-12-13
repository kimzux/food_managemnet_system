@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="submit" data-toggle="modal" data-target="#addUserModal" class="btn btn-primary mb-4">Click here to add User</button>
    </div>
    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            <br />
        @endif
        <table id="users_datatable" class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Role</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->roles[0]->name ?? '' }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <button href="{{ route('users.edit', $user->id) }}" data-id="{{$user->id}}" class="btn btn-info" data-toggle="modal" data-target="#editRole">Role</button>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
    <div class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Edit User Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editRoleForm" method="post">
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Role</label>
                                    <div class="col-sm-4">
                                        <select name="role" id="role">
                                            @foreach ($roles as $role)
                                            <option value="{{$role->id}}">
                                                {{$role->name}}
                                            </option>
                                            @endforeach
                                        </select>
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
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="addForm" action="{{route('users.store')}}" method="post">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input  id="name" class="form-control" name="name" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input  id="email" class="form-control" name="email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                   
                                    <div class="col-sm-8"> 
                                        <i  id="toggle_pwd" class="fa fa-fw fa-eye field_icon " ></i> 
                                        <input  id="password" type="password" class="form-control " name="password"/>
                                       
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
        $('#users_datatable').DataTable({});
        $('#editRole').on('show.bs.modal', function(event) {
            let button = event.relatedTarget;
            let id = $(button).data('id');
            let action = "{{ route('users.roles.update', 'user_id') }}";
            action = action.replace('user_id', id);
            $('#editRoleForm').attr('action', action);
        })
    </script>
    <script type="text/javascript">
        $(function () {
            $("#toggle_pwd").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#password").attr("type", type);
            });
        });
    </script>
@endpush

