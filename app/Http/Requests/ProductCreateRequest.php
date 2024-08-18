<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\ProductCategory;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
    
    *public function authorize(): bool
    *{
    *    return false; Ajustar futuramente 
    *}
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'brand' =>  ['nullable','string','max:255'],
            'category' => ['required', Rule::enum(ProductCategory::class)],
            'price' => ['required', 'numeric', 'min:0', 'regex:/^\d{1,5}(\.\d{1,2})?$/'],
            'quantity' => ['required','integer','min:0'],
        ];
    }
}
