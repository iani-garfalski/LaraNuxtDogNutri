<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogFoodRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'dog_breed_id' => 'required|exists:dog_breeds,id',
        ];
        
        return $rules;
    }
}
