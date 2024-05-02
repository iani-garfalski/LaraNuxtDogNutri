<?php

namespace App\Http\Controllers;

use App\Models\Stockpile;
use App\Http\Requests\StockpileRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StockpileController extends Controller
{
    public function index()
    {
        $stockpile = Stockpile::with('dogFood')->get();
        return response()->json($stockpile);
    }

    public function show($id)
    {
        try {
            $stockpile = Stockpile::with('dogFood')->findOrFail($id);
            return response()->json($stockpile);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Stockpile not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function store(StockpileRequest $request)
    {
        $createdStockpile = Stockpile::create($request->validated());
        return response()->json([
            'stockpile' => $createdStockpile,
            'message' => 'Stockpile created successfully.'
        ]);
    }

    public function update(StockpileRequest $request, $id)
    {
        try {
            $stockpile = Stockpile::findOrFail($id);
            $stockpile->update($request->all());

            return response()->json(['message' => 'Stockpile updated successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Stockpile not found'], 404);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()->first()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update stockpile'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $stockpile = Stockpile::findOrFail($id);
            $stockpile->delete();

            return response()->json(['message' => 'Stockpile deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Stockpile not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete stockpile'], 500);
        }
    }
}