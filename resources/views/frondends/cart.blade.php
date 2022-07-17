@extends('layouts.app')

@section('content')

<div class="container-fluid bg-dark p-5 text-white">

<h2> <i class="fa-solid fa-cart-arrow-down"></i> Your Cart</h2>

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
      <th scope="col">Action</th>

      
    </tr>
  </thead>
  <tbody>
    @php  $no = 1; $total = 0; @endphp
    @foreach($carts as $key=>$cart)
    @php

    $total +=  $cart['qty'] * $cart['price'] ;
    
    @endphp
    <tr>
      <th scope="row">{{$no}}</th>
      <td>
        <img src="{{asset('assets/product/'.$cart['image'])}}" width="40" height="40" alt="">
      </td>
      <td>{{$cart['title']}}</td>
      <td>{{$cart['qty']}}</td>
      <td>{{$cart['price']}}</td>
      <td>
        {{ $cart['qty'] * $cart['price'] }}
      </td>
      <td>

      <a href="{{route('carts.add', $key)}}"><i class="fa-solid fa-circle-plus"></i></a>
      <a href="{{route('carts.substract', $key )}}"><i class="fa-solid fa-circle-minus"></i></a>
      <a href="{{route('carts.delete', $key )}}"><i class="fa-solid fa-trash"></i></a>

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
      <td colspan="5">Total</td>
      <td>{{$total}} </td>
      <td>SGD</td>
    </tr>
  </tfoot>
</table>

</div>

<div class="container-fluid text-white bg-dark ">

<h2 class="pl-5">Fill User Information</h2>

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

<form class="p-5" action="{{route('carts.checkout')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

      <label for="title">User Name</label>
      <input name="name" type="text" class="form-control" id="name" placeholder="Enter User Name">
    </div>


    <div class="form-group">

      <label for="phone">Phone</label>
      <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter phone number">
    </div>

    <div class="form-group">

      <label for="address">Address</label>
      <input name="address" type="text" class="form-control" id="address" placeholder="Enter address">
    </div>

    


    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-circle-check"></i> Check Out</button>
  </form>


</div>


@endsection