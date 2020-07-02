<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Str;
// use App\Http\Requests\StoreProduct as StoreProductRequest;
// use App\Http\Requests\UpdateProduct as UpdateProductRequest;
use Auth;
use Gate;
use App\User;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;


class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Products::paginate(8);
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $users = User::all();
        return view('products.create', compact( 'users'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->only('name', 'price', 'published'); 
        $data['slug'] = Str::slug($data['name']);
        $data['user_id'] = Auth::user()->id;
        // die($data['for_user_id']);
        $product = Products::create($data);
        return redirect()->route('home');
        // return redirect()->route('edit_post', ['id' => $post->id]);
    }

    public function edit(Products $product)
    {
        // dd();
        $users = User::all();
        return view('products.edit', compact('product', 'users'));
    }
    public function update(Products $product, Request $request)
    {
        $data = $request->only('name', 'price', 'published'); 
        $data['slug'] = Str::slug($data['name']);
        $product->fill($data)->save();
        return redirect()->route('home');
    }
    public function destroy(Products $product)
    {
        $product->delete();
  
        return redirect()->route('home');
    }
    public function export() 
    {
        return Excel::download(new ProductsExport, 'highlands_products.xlsx');
    }
}
