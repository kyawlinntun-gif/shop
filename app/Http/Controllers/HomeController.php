<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
    {
        if ($id) {
            $categories = Category::all();
            $products = Product::where('category_id', $id)->get();
            return view('index', [
                'categories' => $categories,
                'products' => $products
            ]);
        } else {
            $categories = Category::all();
            $products = Product::with('category')->get();
            return view('index', [
                'categories' => $categories,
                'products' => $products
            ]);
        }
    }
}
