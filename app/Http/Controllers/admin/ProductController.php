<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::orderby('id','DESC')->paginate('20');
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        return view('admin.product.add');
    }

    public function store(Request $request){
        $request->validate([
            'Name'=>'required',

        ]);

        Product::create([
            'prod' => $request->get('Name'),

        ]);
        return redirect()->route('admin.product.index')->with('sucess','product created successfully!');
    }

    public function edit(string $id){
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    public function update(Request $request, string $id){
        $product=Product::find($id);
        $request->validate([
            'Name'=>'required',

        ]);

        $product->update([
            'prod' => $request->get('Name'),

        ]);
        return redirect()->route('admin.product.index')->with('success', 'product updated successfully!');
    }

    public function destroy(string $id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index');
    }

    public function search(Request $request)
    {

        $searchQuery=$request->input('search');

        $records=Product::where(function($query) use ($searchQuery) {
        $query->where('prod','LIKE',"%{$searchQuery}%")
        ->orWhere('id','LIKE',"%{$searchQuery}%");
        })->paginate(8);
        // dd($records);
        return view('admin.product.view',compact('searchQuery','records'));

    }

}
