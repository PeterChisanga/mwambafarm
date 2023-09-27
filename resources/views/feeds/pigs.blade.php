@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">Pig Feed Information</h1>
    <div class="table-responsive mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Intended for Animal</th>
                    <th>Weight</th>
                    <th>Price</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pigFeed as $feed)
                <tr>
                    <td>{{ $feed->name }}</td>
                    <td>{{ $feed->type }}</td>
                    <td>{{ $feed->intended_for_animal }}</td>
                    <td>{{ $feed->weight }} Kg</td>
                    <td>K {{ $feed->price }}</td>
                    <td>{{ $feed->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
