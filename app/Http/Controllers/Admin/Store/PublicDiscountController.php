<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\Discount\PublicDiscountRequest;
use App\Models\Store\Public_discount;
use Illuminate\Http\Request;

class PublicDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $public_discounts = Public_discount::all();
        return respons('success', $public_discounts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicDiscountRequest $request)
    {
        $inputs = $request->all();
        Public_discount::create($inputs);
        
        return respons('created discount successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( Public_discount $publicDiscount)
    {
        return respons('success',$publicDiscount);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicDiscountRequest $request,  Public_discount $publicDiscount)
    {
        $inputs = $request->all();
        $publicDiscount->update($inputs);
        return respons('updated discount successfully');
    }

    
    public function destroy(Public_discount $publicDiscount)
    {
        $publicDiscount->delete();
        return respons('deleted discount successfully');
    }
   
   public function toggle_status(Public_discount $publicDiscount)
   {
      $publicDiscount->status = $publicDiscount->status == '0' ? '1' : '0';
      $publicDiscount->save();
      return respons('updated discount successfully');
      
    }
}
