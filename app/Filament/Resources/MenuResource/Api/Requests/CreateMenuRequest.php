<?php

namespace App\Filament\Resources\MenuResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
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
    public function rules(): array
    {
        return [
			'category_id' => 'required',
			'name' => 'required',
			'description' => 'required|string',
			'price' => 'required',
			'image' => 'required',
			'available' => 'required',
			'deleted_at' => 'required'
		];
    }
}
