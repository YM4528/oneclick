<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('frondends.orders.index', ['customers'=>$customers]);
    }

    public function show($id){
        $customers = Customer::find($id);
        $orders = Order::where('customer_id', $id)->get();
        return view('frondends.orders.show', ['orders'=>$orders, 'customer'=>$customers]);
    }

    public function delete($id){

        $orders = Order::where('customer_id', $id)->get();
        foreach($orders as $order){
            Order::destroy($order->id);
        }
        Customer::destroy($id);

        return redirect()->back()->with('status', 'Customer Order Deleted Successfully');
    }
}
