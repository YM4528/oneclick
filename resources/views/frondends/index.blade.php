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
        <a class="nav-link text-white" href="#service-box">SERVICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#app-box">ABOUTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#product">PRODUCT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#footer">CONTACT</a>
      </li>


    </ul>

  </div>
</nav>

<!--<bannner>-->

<section id="banner">

  <div class="row">

    <div class="col-md-6 text-center pb-4 " data-aos="fade-right">
      <h2 class="header-title ">What can we do?</h2>
      <p class="header-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
      <button class="header-btn">Learn More</button>
    </div>

    <div class="col-md-6" data-aos="fade-left">

      <img src="{{asset('assets/images/social1.png')}}" class="banner-image" alt="">

    </div>

  </div>
  <img src="{{asset('assets/images/whitewave.png')}}" alt="" class="divider img-fluid w-100">
</section>

<!--endbanner-->

<!--service-->

<section class="container" id="service-box">
  <h2 class="service-title text-center mt-3">Our Service</h2>

  <div class="row mt-5" data-aos="fade-up-right">

    @foreach($services as $services)

    <div class="col-md-4 ">
      <img src='{{asset("assets/service/$services->image")}}'' class="service-image" alt="">
      <h2>{{$services->title}}</h2>
      <p>{{ $services->description }}</p>
    </div>

    @endforeach

  </div>

</section>

<!--endservice-->

<!--appbox-->

<section id="app-box">
  <h2 class="text-center">Our App for You</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-6" data-aos="fade-up-right">
        <img src="{{asset('assets/images/social1.png')}}" class="appimg" alt="">
      </div>
      <div class="col-md-6" data-aos="fade-up-left">
        <div class="app-body">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae error pariatur, tempore quidem nihil nemo assumenda at amet veniam fuga, facere quis harum minus dignissimos iusto voluptatum velit perferendis dolore.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae error pariatur,</p>
          <div class="group text-center">
            <button class="app-btn">IOS App</button>
            <button class="app-btn">IOS Android</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--endappbox-->

<!--products-->

<section id="product">

  <div class="container mt-5">
    <h2 class="text-center product-title">Our Product</h2>
    <div class="row">


  @foreach($products as $product)
      <!--startcard-->

      <div class="card col-md-3" data-aos="zoom-in">
        <img class="card-img-top" height=230 src='{{asset("assets/product/$product->image")}}' alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $product->title }}</h5>
          <p class="card-text">{{ $product->description }}</p>

          <div class="row">
            <p class="pl-5">MMK {{$product->price}} </p>
            <p class="ml-auto pr-5">
              <i class="fa-solid fa-cart-arrow-down"></i>
              <span class="badge badge-pill badge-dark">0</span>
            </p>
          </div>

          <div class="text-center">
          <a href="{{route('products.show')}}" class="card-btn"> <i class="fa-solid fa-cart-arrow-down"></i>View More</a>
          </div>

          
        </div>
      </div>

      <!--endcart-->
      @endforeach

     

     

    </div>
  </div>

</section>

<!--endproducts-->

<!--footer-->

<section id="footer">
  <img src="{{asset('assets/images/whitewave1.png')}}" class="footer-img" alt="">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6" data-aos="zoom-in">
        <h2 class="mt-5">CONTANT US</h2>
        <i class="fa-solid fa-location-dot"></i>
        <span>Yangon, Myanmar</span>
        <br><br>
        <i class="fa-solid fa-phone-volume"></i>
        <span>+959 774124474</span>
        <br><br>
        <i class="fa-solid fa-envelope"></i>
        <span>yadanar.it.1999@gmail.com</span>
        <br>
      </div>

      <div class="col-md-6" data-aos="zoom-in-up">
        <div class="map">
        <h2 class="mb-3">OUR LOCATION</h2>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127640.24563079956!2d103.60961437225342!3d1.3211605262026718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1bce31e40ba9%3A0xb28fcac5222010a4!2sBlock%2043%20HDB%20Teban%20Gardens!5e0!3m2!1sen!2smm!4v1657530503242!5m2!1sen!2smm" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      
        </div>
    </div>
    </div>
  </div>
  <p id="footer-bar">Designed and Developed by Yadanar Moe</p>
</section>

<!--endfooter-->



@endsection