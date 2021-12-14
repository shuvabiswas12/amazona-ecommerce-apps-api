<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // get all data
    public function index()
    {
        return Products::all();
    }

    // create data in database
    public function store(Request $request)
    {
        // post data to database

        // validation field
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'categories_id' => 'required'
        ]);

        return Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'image' => $request->image,
            'categories_id' => $request->categories_id
        ]);
    }

    // display a single data from database based on a product id
    public function show($id)
    {
        return Products::where("id", $id)->get();
    }

    // show all products by category id
    public function getProductsByCategory($category_id)
    {
        return Products::where('categories_id', $category_id)->get();
    }

    // update a product based on product id
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        return $product->update($request->all());
    }

    // delete a product based on product id
    public function destroy($id)
    {
        return Products::destroy($id);
    }
}
