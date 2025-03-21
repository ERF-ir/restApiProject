<?php

namespace App\Http\Requests\Admin\Content;

use http\Env\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostCategoryRequesr extends FormRequest
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


    public function rules(): array
    {

        return [
            'name' => 'required|max:100',

        ];
    }


}
