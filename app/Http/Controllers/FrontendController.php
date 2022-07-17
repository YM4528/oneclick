<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::take(6)->get();
        $services = Service::take(3)->get();
        session()->forget('carts');
        return view('frondends.index',['products'=>$products, 'services'=>$services]);
    }

    public function show(){
        $products = Product::paginate(6);
        //session()->forget('carts');
        return view('frondends.show', ['products'=>$products]);
    }
}
