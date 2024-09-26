@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Car</h1>
    <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="car_name" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="car_name" name="car_name" required>
        </div>

        <div class="mb-3">
            <label for="car_type" class="form-label">Car Type</label>
            <input type="text" class="form-control" id="car_type" name="car_type" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="top_speed" class="form-label">Top Speed (km/h)</label>
            <input type="number" class="form-control" id="top_speed" name="top_speed" required>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Upload Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple required>
        </div>

        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
</div>
@endsection