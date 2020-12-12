<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


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

    public function cartlist()
    {
      $userid= Session::get('user')->id;
      $cartdata =  DB::table('cart')
                    ->join('products','cart.product_id','products.id')
                    ->select('products.*','cart.id as cartid')
                    ->where('cart.user_id',$userid)
                    ->get();

      return view('cartlist',compact('cartdata'));
    }

    public function removeFromCart($id)
    {
        Cart::destroy($id);
        
        Session::flash('message', "Product removed from cart.");
        return Redirect::back();
    }
}
