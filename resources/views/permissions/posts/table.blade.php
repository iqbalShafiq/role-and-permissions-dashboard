@extends('layouts.base')

@section('body')
<div class="p-4">
    <div class="row">
        <div class="col-md-3">
            <x-layouts.sidebar></x-layouts.sidebar>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Table of Post</div>

                <div class="card-body">
                    Welcome home, {{ auth()->user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
