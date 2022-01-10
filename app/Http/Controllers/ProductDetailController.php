<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function getProductDetails($productId){
        $details = DB::table('products')
                        ->where('products.id', 'LIKE', $productId)
                        ->get();
        return view('productDetail', ['productDetail'=>$details]);
    }
}