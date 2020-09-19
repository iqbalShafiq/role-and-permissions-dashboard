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
                    @include('permissions.permission.partials.form')

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
                            @foreach ($permissions as $index=>$permission)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->created_at->format("d F Y") }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <a href="{{ route('permission.edit', $permission->id) }}"
                                                class="btn btn-primary">
                                                Edit
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('permission.delete', $permission->id) }}"
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
