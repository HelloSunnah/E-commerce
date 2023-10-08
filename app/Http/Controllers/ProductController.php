<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use Illuminate\Http\Request;
use Laravel\Prompts\Prompt;

class ProductController extends Controller
{
    /**
     * --------------------------------------------------------
     *  handle the product Create, Delete,Update
     * --------------------------------------------------------
     * 
     * @contributor Shahria Sunnah   <sunnahshahria@gmail.com>
     * @last_modified october 08, 2023
     * 
     */
    public function productList()
    {
        $products = Product::all();
        return view('backend.product.list', compact('products'));
    }

    //product Create blade
    public function productCreate()
    {
        return view('backend.product.create');
    }
    //product create post method
    public function productCreateSave(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required'
        ]);
        //for saving image
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/products/product/'), $fileName);
            $fileName = "/products/product/" . $fileName;
        }
        //for save data in product table
        $product = new Product([
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'category' => $request->input('category'),
            'image' => $fileName,
        ]);
        $product->save();



        //for saving data variation table with product_id
        foreach ($request->input('variation_name') as $key => $name) {
            $product->variations()->create([
                'name' => $name,
                'size' => $request->input('variation_size')[$key],
                'id_code' => $request->input('variation_id')[$key],
            ]);
        }
        return redirect()->route('product.list')->with('success', 'Product created successfully');
    }


    //product delete form product table
    public function productDelete($id)
    {
        Product::find($id)->delete();
        return back();
    }
    //product Edit Blade
    public function productEdit($id)
    {
        $variations = Variation::where('product_id', $id)->get();
        $productList = Product::find($id);
        return view('backend.product.create', compact('productList', 'variations'));
    }

    //product Edt post Method
    public function productEditSave(Request $request, $id)
    {
        $variations = Variation::where('product_id', $id)->get();
        $productList = Product::find($id);


        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/products/product/'), $fileName);
            $fileName = "/products/product/" . $fileName;
        }


        $productList->updateOrCreate([
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'category' => $request->input('category'),
            'image' => $fileName,
        ]);
        $productList->save();

        foreach ($request->input('variation_name') as $key => $name) {
            $productList->variations()->update([
                'name' => $name,
                'size' => $request->input('variation_size')[$key],
                'id_code' => $request->input('variation_id')[$key],
            ]);
        }

        return redirect()->route('product.list')->with('success', 'Product updated successfully');
    }
}
