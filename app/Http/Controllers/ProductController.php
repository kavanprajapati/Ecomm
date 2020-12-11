<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

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

    public function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $user = $req->session()->get('user');
           $cart = new Cart;
           $cart->user_id=$user->id;
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect("/");
        }
        else
        {
            return redirect("/login");
        }
    }

    public static function cartItem()
    {
       $userid= Session::get('user')->id;

       return Cart::where('user_id',$userid)->count();
    }
}
