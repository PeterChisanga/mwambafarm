@extends('master')
@section('content')
<div class="container">
    <h1 class="mt-5">All Cattle</h1>
    <div class="d-md-flex justify-content-md-between mt-4">
        <div class="mb-2 mb-md-0">
            <a href="/cattle/register" class="btn btn-primary btn-sm mr-2">Register Cattle</a>
            <a href="/cattle/females" class="btn btn-info btn-sm mr-2">Female Cattle</a>
            <a href="/cattle/males" class="btn btn-info btn-sm">Male Cattle</a>
            <a href="/feeds/cattle" class="btn btn-success btn-sm mt-2">Feed</a>
        </div>
        <div class="mb-2 mb-md-0 mt-2 mt-md-0">
            <a href="/cattle/fattenning" class="btn btn-warning btn-sm mr-2">Cattle for Sale</a>
            <a href="/cattle/dead" class="btn btn-danger btn-sm mr-2">Dead Cattle</a>
            <a href="/cattle/quarantine" class="btn btn-secondary btn-sm mr-2">Quarantine Cattle</a>
            <a href="/cattle/sold" class="btn btn-success btn-sm mt-2">Sold Cattle</a>
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
                    <th>Date of Birth</th>
                    <th>Date of Arrival</th>
                    <th>Weight</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through cattle and display them in rows -->
                @foreach($items as $cattle)
                <tr>
                    <td>{{ $cattle->name }}</td>
                    <td>{{ $cattle->age }}</td>
                    <td>{{ $cattle->sex }}</td>
                    <td>{{ $cattle->breed }}</td>
                    <td>{{ $cattle->mother }}</td>
                    <td>{{ $cattle->date_of_birth }}</td>
                    <td>{{ $cattle->date_of_arrival }}</td>
                    <td>{{ $cattle->weight }}</td>
                    <td>{{ $cattle->status }}</td>
                    <td>
                        <a href="/cattle/edit/{{$cattle['id']}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="/cattle/delete/{{$cattle->id}}" method="POST" class="d-inline" id="deleteForm{{$cattle->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="confirmDelete({{$cattle->id}})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
