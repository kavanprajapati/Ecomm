<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function index(Request $req)
    {
        $products = $products = Product::all();

        return view('product', compact('products'));
    }

    public function detail($id)
    {
        $detail = Product::find($id);

        return view('detail', compact('detail'));
    }

    public function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('keyword') . '%')->get();

        return view('search', compact('data'));
    }

    public function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $user = $req->session()->get('user');
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect("/");
        } else {
            return redirect("/login");
        }
    }

    public static function cartItem()
    {
        $userid = Session::get('user')->id;

        return Cart::where('user_id', $userid)->count();
    }

    public function cartlist()
    {
        $userid = Session::get('user')->id;
        $cartdata =  DB::table('cart')
            ->join('products', 'cart.product_id', 'products.id')
            ->select('products.*', 'cart.id as cartid')
            ->where('cart.user_id', $userid)
            ->get();

        return view('cartlist', compact('cartdata'));
    }

    public function removeFromCart($id)
    {
        Cart::destroy($id);
        Session::flash('message', "Product removed from cart.");
        return Redirect::back();
    }

    public function orderNow()
    {
        $userid = Session::get('user')->id;
        $total_price =  DB::table('cart')
            ->join('products', 'cart.product_id', 'products.id')
            ->select('products.*', 'cart.id as cartid')
            ->where('cart.user_id', $userid)
            ->sum('products.price');

        return view('ordernow', compact('total_price'));
    }

    public function orderPlace(Request $req)
    {
        $userid = Session::get('user')->id;
        $allCartData = Cart::where('user_id', $userid)->get();

        foreach ($allCartData as $cart) {
            $order = new Order;
            $order->product_id = $cart->id;
            $order->user_id = $cart->user_id;
            $order->address = $req->address;
            $order->status = "pending";
            $order->payment_method = $req->payment_method;
            $order->payment_status = "pending";
            $order->save();
        }

        $removeFromCart = Cart::where('user_id', $userid)->delete();
        return redirect('/');
    }

    public function myOrders()
    {
        DB::enableQueryLog();

        $userid = Session::get('user')->id;
        $orders =   DB::table('orders')
            ->join('products', 'orders.product_id', 'products.id')
            ->select('orders.*', 'products.name as name','products.gallery as gallery')
            ->where('orders.user_id', $userid)
            ->get();

        return view('myorders', ['orders' => $orders]);
    }
}
