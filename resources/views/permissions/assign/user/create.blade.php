@extends('layouts.base')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
<div class="p-4">
    <div class="row">
        <div class="col-md-3">
            <x-layouts.sidebar></x-layouts.sidebar>
        </div>

        <div class="col-md-8 mt-4">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="card mb-3">
                <div class="card-header">Assign Roles</div>

                <div class="card-body">
                    <form action="{{ route('assign.user.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="role">Roles</label>
                            <select class="custom-select select-2" id="role" name="roles[]" multiple>
                                <option disabled>Choose...</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Assign</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Table of Roles of User</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                <td>
                                    <a href="{{ route('assign.user.edit', $user->id) }}">Sync</a>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-2').select2({
            placeholder: 'Please select roles'
        });
    });
</script>
@endpush
