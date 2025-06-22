<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * 製品一覧を表示
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchword = $request->input('searchword');
        $products = Product::when($searchword,function($q,$k){
            return $q->where('name','like','%'.$k.'%');
        })->paginate(10);
        return view('products.index', compact('products', 'searchword'));
    }
}