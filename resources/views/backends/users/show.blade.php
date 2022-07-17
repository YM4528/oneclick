@extends('layouts.app')

@section('content')

<div class="container bg-dark p-5">

<h2 class="text-center"><i class="fa-solid fa-user"></i> User profile</h2>

<div class="text-center">

<img src='{{asset("assets/user/$user->profile")}}'class="img-circle mt-3" width="150" height="150" alt="">

</div>


<div class="form-group">

      <label for="name">User Name</label>
      <input name="name" type="text" class="form-control" id="name" 
      value="{{$user->name}}">
    </div>

    <div class="form-group">

      <label for="email">Email</label>
      <input name="email" type="text" class="form-control" id="email" 
      value="{{$user->email}}">
    </div>

</div>

@endsection