@extends('master')
@section('content')

<div class="container mt-5">
    <div class="jumbotron">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="display-4">Animal Feed</h1>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-success btn-block btn-lg" href="/feeds/register" role="button">
                    <i class="fas fa-plus-circle"></i> Register Feed
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg" href="/feeds/pigs" role="button">
                    <i class="fas fa-piggy-bank"></i> View Pig Feed
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-success btn-block btn-lg" href="/feeds/cattle" role="button">
                    <span style="font-size: 1em;">🐄</span> View Cattle Feed
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-info btn-block btn-lg" href="/feeds/sheep" role="button">
                    <span style="font-size: 1em;">🐑</span> View Sheep Feed
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-warning btn-block btn-lg" href="/feeds/goats" role="button">
                    <span style="font-size: 1em;">🐐</span> View Goat Feed
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
