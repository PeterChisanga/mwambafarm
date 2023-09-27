@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-5">Register Feed</h1>
    <div class="mt-4 text-danger">
        <p><strong>*</strong> indicates mandatory fields</p>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <form action="/feeds/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="type">Type <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="" disabled selected>Select a feed type</option>
                        <option value="Grains">Grains</option>
                        <option value="Forages">Forages</option>
                        <option value="Concentrates">Concentrates</option>
                        <option value="Roughages">Roughages</option>
                        <option value="Minerals and Vitamins">Minerals and Vitamins</option>
                        <option value="Complete Feeds">Complete Feeds</option>
                        <option value="Additives and Supplements">Additives and Supplements</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="intended_for_animal">Intended for Animal <strong class="text-danger">*</strong></label>
                    <select class="form-control" id="intended_for_animal" name="intended_for_animal" required>
                        <option value="cattle">Cattle</option>
                        <option value="pigs">Pigs</option>
                        <option value="goats">Goats</option>
                        <option value="sheep">Sheep</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="weight">Weight <strong class="text-danger">*</strong></label>
                    <input type="number" class="form-control" id="weight" name="weight" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="price">Price <strong class="text-danger">*</strong></label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Register Feed</button>
            </form>
        </div>
    </div>
</div>
@endsection
