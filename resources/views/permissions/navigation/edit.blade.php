@extends('layouts.base')

@section('body')
<div class="p-4">
    <div class="row">
        <div class="col-md-3">
            <x-layouts.sidebar></x-layouts.sidebar>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card mb-3">
                <div class="card-header">Create Navigations</div>

                <div class="card-body">
                    <form action="{{ route('navigation.edit', $navigation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="parent">Parent</label>
                            <select class="custom-select" id="parent" name="parent">
                                <option selected value="{{ old('parent_id') ?? $navigation->parent_id }}">
                                    {{ $navigation->parent->name }}</option>
                                @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="permission">Permission</label>
                            <select class="custom-select" id="permission" name="permission">
                                <option selected value="{{ old('permission_name') ?? $navigation->permission_name }}">
                                    {{ $navigation->permission_name }}</option>
                                @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permission')
                            <div class="text-danger font-weight-bold">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Post"
                                        value="{{ old('name') ?? $navigation->name }}">
                                    @error('name')
                                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" name="url" id="url"
                                        placeholder="posts/create" value="{{ old('url') ?? $navigation->url }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('navigation.destroy', $navigation->id) }}" type="submit"
                            class="btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
