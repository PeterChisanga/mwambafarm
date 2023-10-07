@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">Register Sheep</h1>
    <div class="mt-4 text-danger">
        <p><strong>*</strong> indicates mandatory fields</p>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="/sheep/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" min="1">
                </div>
                <div class="form-group">
                    <label for="sex">Sex <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="sex" name="sex">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="breed">Breed <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="breed" name="breed" required>
                </div>
                <div class="form-group">
                    <label for="color">Color </label>
                    <input type="text" class="form-control" id="color" name="color" >
                </div>
                <div class="form-group">
                    <label for="mother">Mother </label>
                    <input type="text" class="form-control" id="mother" name="mother" >
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                </div>
                <div class="form-group">
                    <label for="date_of_arrival">Date of Arrival</label>
                    <input type="date" class="form-control" id="date_of_arrival" name="date_of_arrival">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" class="form-control" id="weight" name="weight" step="0.01">
                </div>
                <div class="form-group">
                    <label for="status">Status <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="status" name="status">
                        <option value="fattening">Fattening</option>
                        <option value="dead">Dead</option>
                        <option value="sold">Sold</option>
                        <option value="quarantine">Quarantine</option>
                        <option value="breeding">Breeding</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Register Sheep</button>
            </form>
        </div>
    </div>
</div>
@endsection
