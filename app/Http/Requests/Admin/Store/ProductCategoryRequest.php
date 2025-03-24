<?php

namespace App\Http\Requests\Admin\Store;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
   
   public function failedValidation(Validator $validator )
   {
      throw new HttpResponseException(
         respons('validation Error', $validator->errors(), 400)
      );
   }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
           'status' => 'required|in:1,0',
           'image' => 'required|image|mimes:jpeg,png,jpg|max:3048',
           'description' => 'required',
           
        ];
    }
}
