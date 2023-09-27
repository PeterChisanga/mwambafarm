@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">{{ $heading }}</h1>
    <div class="d-md-flex justify-content-md-between mt-4">
        <div class="mb-2 mb-md-0">
            <a href="/sheep" class="btn btn-secondary btn-sm mr-2">All Sheep</a>
            <a href="/sheep/register" class="btn btn-primary btn-sm mr-2">Register Sheep</a>
            <a href="/sheep/females" class="btn btn-info btn-sm mr-2">Female Sheep</a>
            <a href="/sheep/males" class="btn btn-info btn-sm">Male Sheep</a>
            <a href="/feeds/sheep" class="btn btn-success btn-sm mt-2">Feed</a>
        </div>
        <div class="mb-2 mb-md-0 mt-2 mt-md-0">
            <a href="/sheep/sale" class="btn btn-warning btn-sm mr-2">Sheep for Sale</a>
            <a href="/sheep/dead" class="btn btn-danger btn-sm mr-2">Dead Sheep</a>
            <a href="/sheep/quarantine" class="btn btn-secondary btn-sm mr-2">Quarantine Sheep</a>
            <a href="/sheep/sold" class="btn btn-success btn-sm mt-2">Sold Sheep</a>
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
                @foreach($items as $sheep)
                <tr>
                    <td>{{ $sheep->name }}</td>
                    <td>{{ $sheep->age }}</td>
                    <td>{{ $sheep->sex }}</td>
                    <td>{{ $sheep->breed }}</td>
                    <td>{{ $sheep->mother }}</td>
                    <td>{{ $sheep->color }}</td>
                    <td>{{ $sheep->date_of_birth }}</td>
                    <td>{{ $sheep->date_of_arrival }}</td>
                    <td>{{ $sheep->weight }}</td>
                    <td>{{ $sheep->status }}</td>
                    <td>
                        <a href="/sheep/edit/{{$sheep['id']}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="/sheep/delete/{{$sheep->id}}" method="POST" class="d-inline" id="deleteForm{{$sheep->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="confirmDelete({{$sheep->id}})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

