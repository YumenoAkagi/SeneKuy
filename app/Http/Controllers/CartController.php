<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $exists = Cart::firstWhere('product_id', '=', $request->id);

        if($exists == null) {
            $cart = new Cart;
            $cart->user_id = Auth()->id();
            $cart->product_id = $request->id;
            $cart->quantity = $request->quantity;
            $cart->save();
        } else {
            $exists->quantity += $request->quantity;
            $exists->save();
        }

        session()->flash('success', 'Product is Added');

        return redirect('/cart');
    }

    public function updateCart(Request $request)
    {
        $selected = Cart::firstWhere('id', '=', $request->id);

        if($selected == null)
            return back(404);

        $selected->quantity = $request->quantity;
        $selected->save();

        session()->flash('success', 'Cart is Updated');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $selected = Cart::firstWhere('id', '=', $request->id);

        if($selected == null)
            return back(404);

        $selected->delete();

        session()->flash('success', 'Cart is Removed');

        return back();
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All cart is clear');

        return back();
    }

    public function showShoppingCart(){
        $showCategory = Category::all();
        $total = 0;

        $shoppingCart = Cart::where('user_id', '=', Auth()->id())->get();
        $products = collect();

        foreach($shoppingCart as $sc) {
            $pr = Product::find($sc->product_id);
            $products->push($pr);
            $total += $pr->price * $sc->quantity;
        }

        $params['carts'] = $shoppingCart;
        $params['categories'] = $showCategory;
        $params['products'] = $products;
        $params['totalPrice'] = $total;
        
        return view('shoppingCart', $params);
    }
}
