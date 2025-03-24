<?php

namespace App\Http\Requests\Admin\Store\Discount;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CouponDiscountRequest extends FormRequest
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
           'start_at' => 'required|date|date_format:Y-m-d H:i:s',
           'end_at' => 'required|date|date_format:Y-m-d H:i:s',
           'title' => 'required',
           'status' => 'required|in:1,0',
           'user_id' => 'exists:users,id',
           'coupon_code' => 'required|max:15',
           'type' => 'required|in:1,0',
           
        ];
    }
}
