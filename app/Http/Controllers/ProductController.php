<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function showProductCategory($category_id)
    {
        $showCategory = Category::all();
        $productCategory = DB::table('categories')
                            ->join('products', 'categories.id', '=', 'products.category_id')
                            ->where('categories.id', 'LIKE', $category_id)->get();
        $categoryName = Category::find($category_id)->name;

        return view('category', ['productCategories' => $productCategory, 'categories' => $showCategory, 'categoryName' => $categoryName]);
    }

    public function showAddProductPage(){
        $showCategory = Category::all();
        return view('addProduct', ['categories' => $showCategory]);
    }

    public function addProduct(){
        return redirect('/home');
    }

    public function deleteProduct(Request $request){
        $selected = Product::find($request->id);

        if($selected == null)
            return back(404);

        $selected->delete();

        return redirect('/home')->with('success', 'Item successfully deleted.');
    }
}
