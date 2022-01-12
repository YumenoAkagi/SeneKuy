<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showCategoryProfile(){
        $showCategory = Category::all();
        return view('profile', ['categories' => $showCategory]);
    }
    
    public function showCategoryAdmin(){
        $showCategory = Category::all();
        return view('admin', ['categories' => $showCategory]);
    }
}
