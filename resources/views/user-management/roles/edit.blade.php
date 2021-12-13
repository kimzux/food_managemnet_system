@extends('layouts.app')

@section('content')
    <div class="card">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            <br />
        @endif
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $role->name }}" name="name" id="name" class="form-control w-auto">
                </div>
                <h3>
                    permissions
                </h3>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="form-group form-check col-md-4">
                            <input name="permissions[]" type="checkbox" class="form-check-input"
                                id="perm-{{ $permission->id }}" value="{{ $permission->name }}"
                                {{ $role->permissions->contains(fn($item) => $item->id === $permission->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm-{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#roles_datatable').DataTable({});
    </script>
@endpush
