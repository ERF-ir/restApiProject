<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Http\Resources\Admin\Content\MenuResource;
use App\Models\Content\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $input = $request->all();
        Menu::create($input);
        return respons('Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return respons('success',new MenuResource($menu));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $input = $request->all();
        $menu->update($input);
        return respons('Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return respons('Menu deleted successfully');
    }
   
   public function toggle_status(Menu $menu)
   {
      $menu->status = $menu->status == '0' ? '1' : '0';
      $menu->save();
      return respons('updated post successfully',new MenuResource($menu));
   }
}
