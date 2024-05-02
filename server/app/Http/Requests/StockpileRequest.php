<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockpileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $rules = [
            'quantity' => 'required|integer|min:0',
            'dog_food_id' => 'required|exists:dog_foods,id',
        ];
        
        return $rules;
    }
}
