<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\Discount\CouponDiscountRequest;
use App\Models\Store\Coupon_discount;
use Illuminate\Http\Request;

class CouponDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupon_discounts = Coupon_discount::all();
        return respons('success',$coupon_discounts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponDiscountRequest $request)
    {
       $input = $request->all();
       Coupon_discount::create($input);
       return respons('created discount successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon_discount $couponDiscount)
    {
        return respons('show discount successfully', $couponDiscount);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponDiscountRequest $request, Coupon_discount $couponDiscount)
    {
        $input = $request->all();
        $couponDiscount->update($input);
        return respons('updated discount successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon_discount $couponDiscount)
    {
        $couponDiscount->delete();
        return respons('deleted discount successfully');
    }
    public function toggle_status(Coupon_discount $couponDiscount)
    {
        $couponDiscount->status = $couponDiscount->status ? '0' : '1';
        $couponDiscount->save();
        return respons('updated status successfully');
    }
}
