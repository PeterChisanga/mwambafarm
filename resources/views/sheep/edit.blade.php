@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">Edit Sheep</h1>
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
            <form action="/sheep/edit/{{ $sheep->id }}" method="POST">
                @csrf
                <input type="hidden" class="form-control" id="sheep_id" name="sheep_id" value="{{ $sheep->id}}" >
                <div class="form-group">
                    <label for="name">Name <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $sheep->name }}" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ $sheep->age }}" min="1">
                </div>
                <div class="form-group">
                    <label for="sex">Sex <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="sex" name="sex">
                        <option value="male" @if($sheep->sex == 'male') selected @endif>Male</option>
                        <option value="female" @if($sheep->sex == 'female') selected @endif>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="breed">Breed <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="breed" name="breed" value="{{ $sheep->breed }}" required>
                </div>
                <div class="form-group">
                    <label for="color">Color </label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ $sheep->color }}" >
                </div>
                <div class="form-group">
                    <label for="mother">Mother </label>
                    <input type="text" class="form-control" id="mother" name="mother" value="{{ $sheep->mother }}">
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $sheep->date_of_birth }}">
                </div>
                <div class="form-group">
                    <label for="date_of_arrival">Date of Arrival</label>
                    <input type="date" class="form-control" id="date_of_arrival" name="date_of_arrival" value="{{ $sheep->date_of_arrival }}">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" class="form-control" id="weight" name="weight" value="{{ $sheep->weight }}" step="0.01">
                </div>
                <div class="form-group">
                    <label for="status">Status <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="status" name="status">
                        <option value="fattening" @if($sheep->status == 'fattening') selected @endif>Fattening</option>
                        <option value="dead" @if($sheep->status == 'dead') selected @endif>Dead</option>
                        <option value="sold" @if($sheep->status == 'sold') selected @endif>Sold</option>
                        <option value="quarantine" @if($sheep->status == 'quarantine') selected @endif>Quarantine</option>
                        <option value="breeding" @if($sheep->status == 'breeding') selected @endif>Breeding</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Sheep</button>
            </form>
        </div>
    </div>
</div>
@endsection
