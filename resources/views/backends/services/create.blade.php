@extends('layouts.app')

@section('content')

<!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

<div class="container bg-dark p-5">
  <h2 class="pl-5"><i class="fa-solid fa-gear"></i> Add New Service</h2>

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


  <form class="p-5" action="{{route('services.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

      <label for="title">Title</label>
      <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="custom-file">
      <input type="file" class="custom-file-input" name="image" id="customFile">
      <label class="custom-file-label" for="customFile">Upload New Image</label>
    </div>


    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-circle-check"></i> Save</button>
  </form>
</div>


@endsection