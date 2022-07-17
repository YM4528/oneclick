@extends('layouts.app')

@section('content')

<!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

<div class="container bg-dark p-5">
  <h2 class="pl-5"> <i class="fa-solid fa-user-pen"></i> Edit User</h2>

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

  @if(Session::has('status'))

  <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
    {{Session::get('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


  @endif


  <form class="p-5" action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf

   
    <div class="text-center">

<img src='{{asset("assets/user/$user->profile")}}'class="img-circle mt-3" width="150" height="150" alt="">

</div>

    <div class="form-group">

      <label for="title">User Name</label>
      <input name="name" type="text" class="form-control" id="name" value="{{$user->name}}">
    </div>

    <div class="form-group">

      <label for="email">Email</label>
      <input name="email" type="text" class="form-control" id="email" value="{{$user->email}}">
    </div>

    <div class="form-group">

      <label for="title">Password</label>
      <input name="password" type="text" class="form-control" id="password" placeholder="********">
    </div>


    <div class="custom-file">
      <input type="file" class="custom-file-input" name="image" id="customFile">
      <label class="custom-file-label" for="customFile">Upload Profile</label>
    </div>


    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-circle-check"></i>Update</button>
  </form>
</div>


@endsection