@extends('layouts.admin')

@section('content')


  @if(Session::has('success'))
    <p class="alert alert-success">{{ Session('success') }}</p>
  @endif

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">All Orders</h5>
       {{-- <a  href="#" class="btn btn-primary mb-4 text-center float-right">Create Order</a> --}}
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Address</th>
              <th scope="col">Price</th>
              <th scope="col">Status</th>
              <th scope="col">Change Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->name}}</td>
              <td>{{$order->email}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->address}}</td>
              <td>{{$order->price}}</td>
              <td>{{$order->status}}</td>
              <td>
                <a href="{{route('admin.edit.order', $order->id)}}" class="btn btn-warning text-white">Change Status</a>
              </td>
              <td>
                <a href="{{route('admin.delete.order', $order->id)}}" class="btn btn-danger text-white">Delete</a>
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