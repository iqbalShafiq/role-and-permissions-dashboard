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
                    @include('permissions.roles.partials.form')

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Guard Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $index=>$role)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>{{ $role->created_at->format("d F Y") }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('role.delete', $role->id) }}"
                                                class="btn btn-danger">Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
