<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'car_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'top_speed' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
        ]);

        $car = new Car();
        $car->car_name = $request->car_name;
        $car->car_type = $request->car_type;
        $car->price = $request->price;
        $car->top_speed = $request->top_speed;
        $car->user_id = Auth::id(); // Set user ID from authenticated user

        // Save car details to database
        $car->save();

        // Handle image upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image and associate with car (implement image storage logic)
                $path = $image->store('cars'); // Store in cars directory
                // You may want to create a separate model for images if needed.
            }
        }

        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }

    public function index()
    {
        $cars = Car::all(); // Fetch all cars for listing
        $user = Auth::user(); // Get authenticated user
        $header = "Car Listings"; // Define your header here
        $slot = "Car Slot"; // Define your header here

    return view('cars.index', compact('cars', 'user', 'header', 'slot'));
    }
}