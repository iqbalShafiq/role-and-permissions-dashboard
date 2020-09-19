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
                <div class="card-header">Assign Permissions</div>

                <div class="card-body">
                    <form action="{{ route('assign.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="custom-select" id="role" name="role">
                                <option value="{{ $role->id }}" selected>
                                    {{ $role->name }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="permission">Permissions</label>
                            <select class="custom-select select-2" id="permission" name="permissions[]" multiple>
                                <option disabled>Choose...</option>
                                @foreach ($permissions as $permission)
                                <option {{ $role->permissions()->find($permission->id) ? 'selected' : '' }}
                                    value="{{ $permission->id }}">{{ $permission->name }}</option>
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
            placeholder: 'Please select permissions'
        });
    });
</script>
@endpush
