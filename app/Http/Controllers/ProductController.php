<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        $products = $products = Product::all();

        return view('product',compact('products'));
    }

    public function detail($id)
    {
      $detail = Product::find($id);

      return view('detail',compact('detail'));
    }

    public function search(Request $req)
    {
        $data = Product::where('name','like','%'.$req->input('keyword').'%')->get();

        return view('search',compact('data'));
    }
}
