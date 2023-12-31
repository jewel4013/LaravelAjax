<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('welcome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name,except,id',
            'price' => 'required'
        ]);
        // dd($request->all());
        // Product::create([
        //     'name' => request('name'),
        //     'price' => request('price'),
        // ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'up_name' => 'required|unique:products,name,'.$request->up_id,
            'up_price' => 'required'
        ]);

        Product::where('id', $request->up_id)->update([
            'name' => $request->up_name,
            'price' => $request->up_price,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function paginate(Request $request){
        $products = Product::latest()->paginate(5);
        return view('paginateData', compact('products'))->render();
    }

    public function search(Request $request){
        $products = Product::where('name', 'like', '%'.$request->keys.'%')
            ->orWhere('price', 'like', '%'.$request->keys.'%')
            ->orderBy('id', 'desc')
            ->paginate(5);
        
        if($products->count() >= 1){
            return view('paginateData', compact('products'))->render();
        }else{
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }
}
