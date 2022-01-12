<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function showHome(){
        $productList = Product::all();
        $showCategory = Category::all();
        return view('home', ['products'=>$productList, 'categories' => $showCategory]);
    }

    public function showCategoryWishList(){
        $showCategory = Category::all();
        return view('wishlist', ['categories' => $showCategory]);
    }

    public function showCategoryCheckout(){
        $showCategory = Category::all();
        return view('checkout', ['categories' => $showCategory]);
    }

    public function showTransaction($product_id)
    {
        $transaction = Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->join('products', 'products.id' , '=', 'transactiondetails.product_id')
        ->join('transactionheaders', 'transactionheaders.id', '=', 'transactiondetails.transaction_id')
        ->where('transactiondetails.id', $product_id)->get();

        return view('transactiondetail', ['transactiondetail' => $transaction]);
    }

    public function cartList()
    {
        $cartItems = Cart::getContent();

        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $item = 
            ['id' => $request->id,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity];
        DB::table('carts')->insert($item);
        session()->flash('success', 'Product is Added');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

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
}
