<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransaction($product_id)
    {
        $transaction = Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->join('products', 'products.id' , '=', 'transactiondetails.product_id')
        ->join('transactionheaders', 'transactionheaders.id', '=', 'transactiondetails.transaction_id')
        ->where('transactiondetails.id', $product_id)->get();


        $params['transactiondetail'] = $transaction;
        return view('transactiondetail', $params);
    }
}
