<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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
        if ($this->method() == 'POST') {
           return [
              'title' => 'required|string|max:255|min:5|unique:posts,title',
              'body' => 'required|string|min:20|max:10000',
              'summery' => 'required|string|min:20|max:10000',
              'image' => 'required|image|mimes:jpeg,png,jpg|max:3048',
              'category_id' => 'required|exists:post_categories,id',
              'status' => 'required|in:0,1',
              'user_id' => 'required|exists:users,id',
           ];
        }
      
           return [];
        
    }
}
