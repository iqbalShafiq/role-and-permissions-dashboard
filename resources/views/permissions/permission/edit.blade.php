@extends('layouts.base')

@section('body')
<div class="p-4">
    <div class="row">
        <div class="col-md-3">
            <x-layouts.sidebar></x-layouts.sidebar>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Permissions</div>

                <div class="card-body">
                    <form action="{{ route('permission.update', $permission->id) }}" class="mb-3" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="permissionName">Name</label>
                            <input type="text" class="form-control" id="permissionName" name="name"
                                value="{{ old('name') ?? $permission->name }}">
                        </div>
                        <div class="form-group">
                            <label for="permissionGuard">Guard</label>
                            <input type="text" class="form-control" id="permissionGuard" name="guard"
                                value="{{ old('guard_name') ?? $permission->guard_name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
