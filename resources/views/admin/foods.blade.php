@extends('layouts.admin')

@section('content')


  @if(Session::has('success'))
    <p class="alert alert-success">{{ Session('success') }}</p>
  @endif


<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">All Foods</h5>
       <a  href="{{route('admin.create.food')}}" class="btn btn-primary mb-4 text-center float-right">Create Food</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Image</th>
              <th scope="col">Description</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($foods as $food)
            <tr>
              <th scope="row">{{$food->id}}</th>
              <td>{{$food->name}}</td>
              <th scope="row"><img src="{{asset('assets/img/'.$food->image.'')}}" width="60" height="60"></th>
              <td>{{$food->description}}</td>
              <td>{{$food->category}}</td>
              <td>{{$food->price}}</td>
              <td>
                <a href="{{route('admin.delete.food', $food->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table> 
      </div>
    </div>
  </div>
</div>


@endsection