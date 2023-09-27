@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">Female Pigs</h1>
    <div class="d-md-flex justify-content-md-between mt-4">
        <div class="mb-2 mb-md-0">
            <a href="/pigs" class="btn btn-primary btn-sm mr-2">All Pigs</a>
            <a href="/pigs/register" class="btn btn-primary btn-sm mr-2">Register Pig</a>
            <a href="/pigs/females" class="btn btn-info btn-sm mr-2">Female Pigs</a>
            <a href="/pigs/males" class="btn btn-info btn-sm">Male Pigs</a>
        </div>
        <div class="mb-2 mb-md-0 mt-2 mt-md-0">
            <a href="/pigs/fattenning" class="btn btn-warning btn-sm mr-2">Pigs for Sale</a>
            <a href="/pigs/dead" class="btn btn-danger btn-sm mr-2">Dead Pigs</a>
            <a href="/pigs/quarantine" class="btn btn-secondary btn-sm mr-2">Quarantine Pigs</a>
            <a href="/pigs/sold" class="btn btn-success btn-sm mt-2">Sold Pigs</a>
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
                <!-- Loop through pigs and display them in rows -->
                @foreach($femalePigs as $pig)
                <tr>
                    <td>{{ $pig->name }}</td>
                    <td>{{ $pig->age }}</td>
                    <td>{{ $pig->sex }}</td>
                    <td>{{ $pig->breed }}</td>
                    <td>{{ $pig->mother }}</td>
                    <td>{{ $pig->date_of_birth }}</td>
                    <td>{{ $pig->date_of_arrival }}</td>
                    <td>{{ $pig->weight }}</td>
                    <td>{{ $pig->status }}</td>
                    <td>
                        <a href="/pigs/edit/{{$pig['id']}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="/pigs/delete/{{$pig->id}}" method="POST" class="d-inline" id="deleteForm{{$pig->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="confirmDelete({{$pig->id}})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
