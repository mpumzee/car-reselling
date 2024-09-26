
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cars List</h1>

    @foreach ($cars as $car)
      <div class="card mb-3">
          <div class="card-body">
              <h5 class="card-title">{{ $car->car_name }}</h5>
              <p class="card-text">Type: {{ $car->car_type }}</p>
              <p class="card-text">Price: ${{ number_format($car->price, 2) }}</p>
              <p class="card-text">Top Speed: {{ $car->top_speed }} km/h</p>
              <!-- Display images if stored -->
              <!-- Add logic to display images here -->
          </div>
      </div>
    @endforeach

</div>
@endsection