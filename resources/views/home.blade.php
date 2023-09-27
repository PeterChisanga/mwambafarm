@extends('master')
@section('content')

<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Farm Management System</h1>
        <p class="lead">Manage your crops and animals with ease using our intuitive system.</p>
        <hr class="my-4">
        <p class="d-none d-md-block">Keep track of your livestock, feed, chemicals, and more.</p>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg" href="/pigs" role="button">
                    <i class="fas fa-piggy-bank"></i> Manage Pigs
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-info btn-block btn-lg" href="/sheep" role="button">
                    <span style="font-size: 1em;">🐑</span> Manage Sheep
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-success btn-block btn-lg" href="/feeds" role="button">
                    <i class="fas fa-leaf"></i> Manage Feeds
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-warning btn-block btn-lg" href="/goats" role="button">
                    <span style="font-size: 1em;">🐐</span> Manage Goats
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-secondary btn-block btn-lg" href="/unavailable" role="button">
                    <i class="fas fa-seedling"></i> Manage Crops
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a class="btn btn-success btn-block btn-lg" href="/unavailable" role="button">
                    <span style="font-size: 1em;">🐄</span> Manage Cattle
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
