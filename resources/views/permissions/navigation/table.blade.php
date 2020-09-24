@extends('layouts.base')

@section('body')
<div class="p-4">
    <div class="row">
        <div class="col-md-3">
            <x-layouts.sidebar></x-layouts.sidebar>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Table of Navigations</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Parent</th>
                                <th scope="col">Name</th>
                                <th scope="col">URL</th>
                                <th scope="col">Permissions Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($navigations as $navigation)
                            <tr>
                                <th scope="row">{{ $navigation->parent->name }}</th>
                                <td>{{ $navigation->name }}</td>
                                <td>{{ $navigation->url }}</td>
                                <td>{{ $navigation->permission_name }}</td>
                                <td>
                                    <a href="{{ route('navigation.edit', $navigation->id) }}">Edit</a>
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
