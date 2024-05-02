<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DogFood;

class InvoiceController extends Controller
{
    public function index()
    {
        // Fetch the dog food with ID of 2
        $dogFood = DogFood::find(2);

        // Check if the dog food exists
        if ($dogFood) {
            // Quantity of items purchased (let's say 2)
            $quantity = 2;

            // Calculate the total price
            $totalPrice = $dogFood->price * $quantity;

            // Render the invoice Blade view from the 'invoice' directory
            $invoiceContent = view('invoices.invoice', [
                'dogFood' => $dogFood,
                'quantity' => $quantity,
                'totalPrice' => $totalPrice
            ])->render();

            // Return the rendered Blade view as a response
            return response($invoiceContent);
        } else {
            // If dog food with ID of 2 is not found, return error response
            return response()->json(['error' => 'Dog food not found'], 404);
        }
    }
}