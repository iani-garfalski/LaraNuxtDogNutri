<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogBreedRequest extends FormRequest
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
            'name' => 'required|unique:dog_breeds|max:255',
            'description' => 'required|string',
            'size' => 'required|string',
            'average_lifespan' => 'required|integer',
            'temperament' => 'required|string',
            'exercise_needs' => 'required|string',
            'grooming_needs' => 'required|string',
            'trainability' => 'required|string',
            'compatibility_with_children' => 'required|string',
            'compatibility_with_other_pets' => 'required|string',
            'origin' => 'required|string',
            'popularity' => 'required|string',
            'appearance' => 'required|string',
            'special_needs' => 'required|string',
            'health_issues' => 'required|string',
        ];

        // Conditionally apply validation rules for the name field
        if ($this->isMethod('post')) {
            $rules['name'] = 'required|unique:dog_breeds,name';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'] = 'sometimes|required|unique:dog_breeds,name,' . $this->route('id');
        }
        
        return $rules;
    }
}
