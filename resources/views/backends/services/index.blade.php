@extends('layouts.app')

@section('content')

<div class="container bg-dark p-5">

<h2><i class="fa-solid fa-gears"></i> Service Lists</h2>

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
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php  $no = 1; @endphp
    @foreach($services as $service)
    <tr>
      <th scope="row">{{$no}}</th>
      <td>{{$service->title}}</td>
      <td>
        <a href="{{route('services.edit', $service->id)}}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="{{route('services.delete', $service->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
      </td>
    </tr>
     
    @php $no++; @endphp
    @endforeach
   
  </tbody>
</table>

</div>


@endsection