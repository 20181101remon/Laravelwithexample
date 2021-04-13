<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //錯誤訊息,僅告沒有哪些資料
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Product::destroy($id);
    }

    /**
     * Search got a name.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //相似字,不需要也無所謂
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
