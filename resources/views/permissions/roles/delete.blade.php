@extends('layouts.base')

@section('body')
<div class="d-flex justify-content-center vh-100 align-items-center">
    <div class="w-100">
        <form action="{{ route('role.destroy', $role->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Are you sure?</h5>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete {{ $role->name }}?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
