@extends('layouts.app')

@section('content')

<div class="container-fluid bg-dark p-5 text-white">

<h2> <i class="fa-solid fa-cart-arrow-down"></i> Order List 
<a class="float-right" href="{{route('orders.index')}}"><i class="fa-solid fa-hand-point-right"></i> To Customer Lists </a> </h2>

@if(Session::has('status'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


@endif

<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Amount</th>

      
    </tr>
  </thead>
  <tbody>
    @php  $no = 1; $total = 0; @endphp
    @foreach($orders as $order)
    @php

    $total +=  $order['qty'] * $order['price'] ;
    
    @endphp
    <tr>
      <th scope="row">{{$no}}</th>
      <td>
        <img src="{{asset('assets/product/'.$order['image'])}}" width="40" height="40" alt="">
      </td>
      <td>{{$order['title']}}</td>
      <td>{{$order['qty']}}</td>
      <td>{{$order['price']}}</td>
      <td>
        {{ $order['qty'] * $order['price'] }}
      </td>
      
      <!--<td>
        <a href="" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
      </td>-->
    </tr>
     
    @php $no++; @endphp
    @endforeach
   
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5"> Total Aount</td>
      <!--<td>Total Amount</td>-->
      <td>{{$total}} SGD </td>
      <!--<td>SGD</td>-->
    </tr>
  </tfoot>
</table>

</div>

<div class="container-fluid text-white bg-dark ">

<h2 class="pl-5">Customer's Information</h2>

@if($errors->any())
  @foreach($errors->all() as $err)

  <div class="alert alert-danger alert-dismissible fade show" role="alert">

    {{$err}}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  @endforeach
  @endif


    <div class="form-group pl-4 pr-4 ">

      <label for="title">User Name</label>
      <input name="name" type="text" class="form-control" id="name" 
      value="{{$customer->name}}" disabled>
    </div>

    <div class="form-group pl-4 pr-4">

      <label for="phone">Phone</label>
      <input name="phone" type="text" class="form-control" id="phone" 
      value="{{$customer->phone}}" disabled>
    </div>

    <div class="form-group pl-4 pb-5 pr-4">

      <label for="address">Address</label>
      <input name="address" type="text" class="form-control" id="address" 
      value="{{$customer->address}}" disabled>
    </div>

  

</div>


@endsection