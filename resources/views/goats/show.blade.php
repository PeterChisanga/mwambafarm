@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">{{ $heading }}</h1> <!-- Dynamic heading -->
    <div class="d-md-flex justify-content-md-between mt-4">
        <div class="mb-2 mb-md-0">
            <a href="/goats/register" class="btn btn-primary btn-sm mr-2">Register Goat</a>
            <a href="/goats" class="btn btn-secondary btn-sm mr-2">All Goats</a>
            <a href="/goats/females" class="btn btn-info btn-sm mr-2">Female Goats</a>
            <a href="/goats/males" class="btn btn-info btn-sm">Male Goats</a>
            <a href="/feeds/goats" class="btn btn-success btn-sm mt-2">Feed</a>
        </div>
        <div class="mb-2 mb-md-0 mt-2 mt-md-0">
            <a href="/goats/sale" class="btn btn-warning btn-sm mr-2">Goats for Sale</a>
            <a href="/goats/dead" class="btn btn-danger btn-sm mr-2">Dead Goats</a>
            <a href="/goats/quarantine" class="btn btn-secondary btn-sm mr-2">Quarantine Goats</a>
            <a href="/goats/sold" class="btn btn-success btn-sm mt-2">Sold Goats</a>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Breed</th>
                    <th>Mother</th>
                    <th>Color</th>
                    <th>Date of Birth</th>
                    <th>Date of Arrival</th>
                    <th>Weight</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $goat)
                <tr>
                    <td>{{ $goat->name }}</td>
                    <td>{{ $goat->age }}</td>
                    <td>{{ $goat->sex }}</td>
                    <td>{{ $goat->breed }}</td>
                    <td>{{ $goat->mother }}</td>
                    <td>{{ $goat->color }}</td>
                    <td>{{ $goat->date_of_birth }}</td>
                    <td>{{ $goat->date_of_arrival }}</td>
                    <td>{{ $goat->weight }}</td>
                    <td>{{ $goat->status }}</td>
                    <td>
                        <a href="/goats/edit/{{$goat['id']}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="/goats/delete/{{$goat->id}}" method="POST" class="d-inline" id="deleteForm{{$goat->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="confirmDelete({{$goat->id}})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
