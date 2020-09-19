@extends('layouts.base')

@section('body')
<div class="p-4">
    <div class="row">
        <div class="col-md-3">
            <x-layouts.sidebar></x-layouts.sidebar>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    <form action="{{ route('role.update', $role->id) }}" class="mb-3" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="roleName">Name</label>
                            <input type="text" class="form-control" id="roleName" name="name"
                                value="{{ old('name') ?? $role->name }}">
                        </div>
                        <div class="form-group">
                            <label for="roleGuard">Guard</label>
                            <input type="text" class="form-control" id="roleGuard" name="guard"
                                value="{{ old('guard_name') ?? $role->guard_name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
