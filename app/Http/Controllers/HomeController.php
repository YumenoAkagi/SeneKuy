<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function showProductCategory($category_id)
    {
        $showCategory = Category::all();
        $productCategory = DB::table('categories')
                            ->join('products', 'categories.id', '=', 'products.category_id')
                            ->where('categories.id', 'LIKE', $category_id)->get();
        // $ProductCategory = Product::join('categories', 'categories.id', '=', 'products.category_id')->where('category_id', 'LIKE', $category_id)->get();
        $categoryName = Category::find($category_id)->name;

        return view('category', ['productCategories' => $productCategory, 'categories' => $showCategory, 'categoryName' => $categoryName]);
    }

    public function showHome(){
        $productList = Product::all();
        $showCategory = Category::all();
        return view('home', ['products'=>$productList, 'categories' => $showCategory]);
    }

    public function showCategoryAboutus(){
        $showCategory = Category::all();
        return view('aboutus', ['categories' => $showCategory]);
    }

    public function showCategoryWishList(){
        $showCategory = Category::all();
        return view('wishlist', ['categories' => $showCategory]);
    }

    public function showCategoryShoppingCart(){
        $showCategory = Category::all();
        return view('shoppingCart', ['categories' => $showCategory]);
    }

    public function showCategoryProfile(){
        $showCategory = Category::all();
        return view('profile', ['categories' => $showCategory]);
    }

    public function showCategorytransactionHistory(){
        $showCategory = Category::all();
        return view('historyTransaction', ['categories' => $showCategory]);
    }

    public function showCategoryCheckout(){
        $showCategory = Category::all();
        return view('checkout', ['categories' => $showCategory]);
    }

    public function showCategoryAdmin(){
        $showCategory = Category::all();
        return view('admin', ['categories' => $showCategory]);
    }

    public function showCategoryAdd(){
        $showCategory = Category::all();
        return view('addProduct', ['categories' => $showCategory]);
    }

    public function showCategoryDelete(){
        $showCategory = Category::all();
        return view('deleteProduct', ['categories' => $showCategory]);
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
        Cart::add([
            'id' => $request->id,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);
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
