@extends('master')
@section('content')

<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Farm Management System</h1>
        <p class="lead">Manage your crops and animals with ease using our intuitive system.</p>
        <hr class="my-4">
        <p class="d-none d-md-block">Keep track of your livestock, feed, chemicals, and more.</p>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mr-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">Register</a>
        </div>
    </div>
</div>

@endsection
