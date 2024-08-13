@php
    $id = session('id');
    $role = session('role');
@endphp


@if (!empty($id))
    @if (\Illuminate\Support\Facades\Auth::id() == $id && $role == 'student')

        @extends('layouts.master')
        @section('content')
            <h1 class="text-center">Admin Dashboard</h1>
        @endsection
    @endif
@endif
