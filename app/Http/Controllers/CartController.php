<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
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

        $selected->remove();

        session()->flash('success', 'Cart is Removed');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All cart is clear');

        return redirect()->route('cart.list');
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
