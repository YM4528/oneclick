@extends('layouts.app')

@section('content')

<!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

<div class="container bg-dark p-5">
  <h2 class="pl-5"><i class="fa-solid fa-gear"></i> Add New User</h2>

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


  <form class="p-5" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

      <label for="title">User Name</label>
      <input name="name" type="text" class="form-control" id="name" placeholder="Enter User Name">
    </div>

    <div class="form-group">

      <label for="email">Email</label>
      <input name="email" type="text" class="form-control" id="email" placeholder="Enter email">
    </div>

    <div class="form-group">

      <label for="title">Password</label>
      <input name="password" type="text" class="form-control" id="password" placeholder="********">
    </div>

    <div class="form-group">

<label for="title">Confirm Password</label>
<input name="password_confirmation" type="text" class="form-control" id="password" placeholder="********">
</div>




    <div class="custom-file">
      <input type="file" class="custom-file-input" name="image" id="customFile">
      <label class="custom-file-label" for="customFile">Upload Profile</label>
    </div>


    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-circle-check"></i> Save</button>
  </form>
</div>


@endsection