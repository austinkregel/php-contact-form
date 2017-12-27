@extends('layouts.app')

@section('content')
<div class="center-the-dang-thing shadow-window text-center" style="max-width: 300px;">
    <h3 class="text-center text-black">Log into {{ config('app.name') }}</h3>
    <a href="/force-login" class="btn btn-default btn-lg">Admin Login</a>
</div>
@endsection
