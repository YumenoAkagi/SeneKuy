<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $cart = new Cart;
        $cart->user_id = $request->user_id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;

        $cart->save();

        session()->flash('success', 'Product is Added');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $selected = Cart::firstWhere()

        session()->flash('success', 'Cart is Updated');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);

        session()->flash('success', 'Cart is Removed');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All cart is clear');

        return redirect()->route('cart.list');
    }

    public function showCategoryShoppingCart(){
        $showCategory = Category::all();
        return view('shoppingCart', ['categories' => $showCategory]);
    }
}
