@extends('master.master')

@section('title',"Home page")

@section('content')

<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
  <a class="navbar-brand text-white" href="#">Shopping</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="/">HOME<span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white" href="#">PRODUCT</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('carts.index')}}">
        <i class="fa-solid fa-cart-arrow-down"></i>
              <span class="badge badge-pill badge-light">
                @if(session()->has('count'))

                {{session()->get('count')}}

                @else 0

                @endif
                
              </span>
        </a>
      </li>
     
     


    </ul>

  </div>
</nav>

<!--<bannner>-->


<!--endbanner-->

<!--service-->


<!--endservice-->

<!--appbox-->



<!--endappbox-->

<!--products-->

<section id="product">

  <div class="container">
    <h2 class="text-center product-title">Our Product</h2>
    <div class="row">


  @foreach($products as $product)
      <!--startcard-->

      <div class="card col-md-3">
        <img class="card-img-top" height=230 src='{{asset("assets/product/$product->image")}}' alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $product->title }}</h5>
          <p class="card-text">{{ $product->description }}</p>

          <div class="row">
            <p class="pl-5">MMK {{$product->price}} </p>
            <p class="ml-auto pr-5">
              <i class="fa-solid fa-cart-arrow-down"></i>
              <!--<span class="badge badge-pill badge-dark">0</span>-->
            </p>
          </div>

          <div class="text-center">
          <a href="{{route('carts.create', $product->id)}}" class="card-btn"> <i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</a>
          </div>

          
        </div>
      </div>

      <!--endcart-->
      @endforeach
    </div>

    {{$products->links()}}
  </div>

</section>

<!--endproducts-->

<!--footer-->

<section id="footer">
 
  <p id="footer-bar">Designed and Developed by Yadanar Moe</p>
</section>

<!--endfooter-->



@endsection