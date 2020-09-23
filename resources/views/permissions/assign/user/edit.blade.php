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
            <div class="card mb-3">
                <div class="card-header">Sync Roles for {{ $user->name }}</div>

                <div class="card-body">
                    <form action="{{ route('assign.user.edit', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="permission">Permissions</label>
                            <select class="custom-select select-2" id="permission" name="roles[]" multiple>
                                <option disabled>Choose...</option>
                                @foreach ($roles as $role)
                                <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">
                                    {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Sync</button>
                    </form>
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
