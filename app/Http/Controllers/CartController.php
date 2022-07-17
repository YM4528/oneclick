<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class CartController extends Controller
{

    public function index(){
        $carts = Session::get('carts');
        return view('frondends.cart', ['carts' => $carts]);
    }

    public function create($id){

        $products = Product::find($id);

        if(Session::exists('carts')) {

            $cart = Session::get('carts');
            $cart[$id] = [
                'title'=>$products->title,
                //'description'=>$products->description,
                'image'=>$products->image,
                'price'=>$products->price,
                'qty' =>1,
            ];
            Session::put('carts', $cart);
          
        } else {
            Session::put('carts', [
                $id=>[
                    'title'=>$products->title,
                    //'description'=>$products->description,
                    'image'=>$products->image,
                    'price'=>$products->price,
                    'qty'=>1,

                ]
            ]);
        }

        $count = count(Session::get('carts'));
        Session::put('count', $count);
        return redirect()->back();

    }

    public function add($key){
        $carts = session()->get('carts');
        $carts[$key]['qty']++;
        session::put('carts', $carts);
        return redirect()->back();
        
    }

    public function substract($key){
        $carts = session()->get('carts');
        if($carts[$key]['qty'] != 1){
            $carts[$key]['qty']--;
        }
        Session::put('carts', $carts);
        return redirect()->back();
    }

    public function delete($key){
        $carts = session()->get('carts');
        unset($carts[$key]);
        Session::put('carts', $carts);
        return redirect()->back();
    }

    public function checkout(Request $request) {
        $request->validate([
            'name'=>"required",
            'phone' => "required",
            'address' => "required",
        ]);
        
       $customer =  Customer::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);

        $carts = session::get('carts');
        foreach ($carts as $cart){
            Order::create([
                'image'=>$cart['image'],
                'title'=>$cart['title'],
                'qty'=>$cart['qty'],
                'price'=>$cart['price'],
                'customer_id'=>$customer->id,
            ]);
        }

        session::forget('carts');

        return redirect('/message');


    }

    public function message() {
        return view('frondends.message');
    }

    
}