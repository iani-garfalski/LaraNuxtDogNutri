<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DogBreed;
use App\Http\Requests\DogBreedRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DogBreedController extends Controller
{
    public function index()
    {
        $dogBreeds = DogBreed::all();

        return response()->json($dogBreeds);
    }

    public function show($id)
    {
        try {
            $dogBreed = DogBreed::findOrFail($id);
            return response()->json($dogBreed);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Dog breed not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function store(DogBreedRequest $request)
    {
        // Validation passed
        $createdDogBreed = DogBreed::create($request->validated());
        return response()->json([
            'dog_breed' => $createdDogBreed,
            'message' => 'Dog breed created successfully.'
        ]);
    }

    public function update(DogBreedRequest $request, $id)
    {
        try {
            $dogBreed = DogBreed::findOrFail($id);
            $dogBreed->update($request->all());

            return response()->json(['message' => 'Dog breed updated successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Dog breed not found'], 404);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()->first()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update dog breed'], 500);
        }
    }

    /**
     * Remove the specified dog breed from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $dogBreed = DogBreed::findOrFail($id);
            $dogBreed->delete();

            return response()->json(['message' => 'Dog breed deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Dog breed not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete dog breed'], 500);
        }
    }
}