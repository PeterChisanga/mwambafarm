@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">Edit Goat</h1>
    <div class="mt-4 text-danger">
        <p><strong>*</strong> indicates mandatory fields</p>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <form action="/goats/edit/{{ $goat->id }}" method="POST">
                @csrf
                <input type="hidden" class="form-control" id="goat_id" name="goat_id" value="{{ $goat->id }}" >
                <div class="form-group">
                    <label for="name">Name <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $goat->name }}" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ $goat->age }}" min="1">
                </div>
                <div class="form-group">
                    <label for="sex">Sex <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="sex" name="sex">
                        <option value="male" @if($goat->sex == 'male') selected @endif>Male</option>
                        <option value="female" @if($goat->sex == 'female') selected @endif>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="breed">Breed <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="breed" name="breed" value="{{ $goat->breed }}" required>
                </div>
                <div class="form-group">
                    <label for="color">Color </label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ $goat->color }}" >
                </div>
                <div class="form-group">
                    <label for="mother">Mother </label>
                    <input type="text" class="form-control" id="mother" name="mother" value="{{ $goat->mother }}">
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $goat->date_of_birth }}">
                </div>
                <div class="form-group">
                    <label for="date_of_arrival">Date of Arrival</label>
                    <input type="date" class="form-control" id="date_of_arrival" name="date_of_arrival" value="{{ $goat->date_of_arrival }}">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" class="form-control" id="weight" name="weight" value="{{ $goat->weight }}" step="0.01">
                </div>
                <div class="form-group">
                    <label for="status">Status <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="status" name="status">
                        <option value="fattening" @if($goat->status == 'fattening') selected @endif>Fattening</option>
                        <option value="dead" @if($goat->status == 'dead') selected @endif>Dead</option>
                        <option value="sold" @if($goat->status == 'sold') selected @endif>Sold</option>
                        <option value="quarantine" @if($goat->status == 'quarantine') selected @endif>Quarantine</option>
                        <option value="breeding" @if($goat->status == 'breeding') selected @endif>Breeding</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Goat</button>
            </form>
        </div>
    </div>
</div>
@endsection
