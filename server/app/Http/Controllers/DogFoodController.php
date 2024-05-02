<?php

namespace App\Http\Controllers;

use App\Models\DogFood;
use App\Http\Requests\DogFoodRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DogFoodController extends Controller
{
    public function index()
    {
        $dogFoods = DogFood::with('dogBreed')->get();
        return response()->json($dogFoods);
    }

    public function show($id)
    {
        try {
            $dogFood = DogFood::with('dogBreed')->findOrFail($id);
            return response()->json($dogFood);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Dog food product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function store(DogFoodRequest $request)
    {
        $createdDogFood = DogFood::create($request->validated());
        return response()->json([
            'dog_food' => $createdDogFood,
            'message' => 'Dog food product created successfully.'
        ]);
    }

    public function update(DogFoodRequest $request, $id)
    {
        try {
            $dogFood = DogFood::findOrFail($id);
            $dogFood->update($request->all());

            return response()->json(['message' => 'Dog food product updated successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Dog food product not found'], 404);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()->first()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update dog food product'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dogFood = Stockpile::findOrFail($id);
            $dogFood->delete();

            return response()->json(['message' => 'Dog food product deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Dog food product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete stockpile'], 500);
        }
    }
}