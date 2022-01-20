<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
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
        $sections = Section::all();
        $products = Product::all();
        return view('products.products', compact('sections', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_name' => 'required|unique:products|max:255',
                'description'  => 'required|string|min:10|max:255',
                'section_id'   => 'required|exists:sections,id',
            ],
            [
                'product_name.required' => 'يرجي ادخال اسم المنتج',
                'product_name.unique'   => 'اسم المنتج مسجل مسبقا',
                'description.required'  => 'يرجى ادخال الوصف الخاص بالمنتج',
                'section_id.required'   => 'يرجى اختيار القسم الخاص بالمنتج'
            ]
        );

        Product::create([
            'product_name' => $request->product_name,
            'description'  => $request->description,
            'section_id'   => $request->section_id,
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Section::where('section_name', $request->section_name)->first()->id;

        $request->validate(
            [
                'product_name' => 'required|max:255|unique:products,product_name,' . $id,
                'description'  => 'required|string|min:10|max:255'
            ],
            [
                'product_name.required' => 'يرجي ادخال اسم المنتج',
                'product_name.unique'   => 'اسم المنتج مسجل مسبقا',
                'description.required'  => 'يرجى ادخال الوصف الخاص بالمنتج'
            ]
        );
        $Products = Product::findOrFail($request->id);

        $Products->update([
            'product_name' => $request->product_name,
            'description'  => $request->description,
            'section_id'   => $id,
        ]);

        session()->flash('edit', 'تم تعديل المنتج بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Product = Product::findOrFail($request->id);
        $Product->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return back();
    }
}
