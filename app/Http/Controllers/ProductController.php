<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{

    public function index()
    {
        $products =Product::all();
        return view('products.index',compact('products'));

    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|string',
            'description'=>'required|string'
        ]);
            Product::create($request->all());
            return redirect()->route('products.index');
    }


    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {

        $product =Product::findOrFail($id);
       // dd($product);

        return view('products.edit', compact('product'));

    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'code'=>'required|string',
            'description'=>'required|string'
        ]);

        $product =Product::findOrFail($id);
       // dd($product);
        $product->update($request->all());
        return redirect()->route('products.index');
    }


    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
    
            
            $product = product::find($id);
    
            // Verifica si el menú existe
            if (!$product) {
                return redirect("/products")->with('status', 'Dish not found');
            }
            
            // Elimina el menú
            $product->delete();
    
            DB::commit();
            
            return redirect("/products")->with('status', 'Product deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect("/products")->with('status', $e->getMessage());
        }
    }
}
