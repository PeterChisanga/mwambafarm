@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">Edit Pig</h1>
    <div class="mt-4 text-danger">
        <p><strong>*</strong> indicates mandatory fields</p>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <form action="/pigs/edit/{{ $pig->id }}" method="POST">
                @csrf
                <input type="hidden" class="form-control" id="pig_id" name="pig_id" value="{{ $pig->id}}" >
                <div class="form-group">
                    <label for="name">Name <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $pig->name }}" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ $pig->age }}" min="1">
                </div>
                <div class="form-group">
                    <label for="sex">Sex <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="sex" name="sex">
                        <option value="male" @if($pig->sex == 'male') selected @endif>Male</option>
                        <option value="female" @if($pig->sex == 'female') selected @endif>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="breed">Breed <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="breed" name="breed" value="{{ $pig->breed }}" required>
                </div>
                <div class="form-group">
                    <label for="mother">Mother </label>
                    <input type="text" class="form-control" id="mother" name="mother" value="{{ $pig->mother }}">
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $pig->date_of_birth }}">
                </div>
                <div class="form-group">
                    <label for="date_of_arrival">Date of Arrival</label>
                    <input type="date" class="form-control" id="date_of_arrival" name="date_of_arrival" value="{{ $pig->date_of_arrival }}">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" class="form-control" id="weight" name="weight" value="{{ $pig->weight }}" step="0.01">
                </div>
                <div class="form-group">
                    <label for="status">Status <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="status" name="status">
                        <option value="fattening" @if($pig->status == 'fattening') selected @endif>Fattening</option>
                        <option value="dead" @if($pig->status == 'dead') selected @endif>Dead</option>
                        <option value="sold" @if($pig->status == 'sold') selected @endif>Sold</option>
                        <option value="quarantine" @if($pig->status == 'quarantine') selected @endif>Quarantine</option>
                        <option value="breeding" @if($pig->status == 'breeding') selected @endif>Breeding</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Pig</button>
            </form>
        </div>
    </div>
</div>
@endsection
