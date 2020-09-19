@extends('layouts.base')

@section('body')
<main>
    <x-layouts.navigation></x-layouts.navigation>
    <div class="py-4">
        @yield('content')
    </div>
</main>
@endsection
