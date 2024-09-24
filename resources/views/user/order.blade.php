@extends('layouts.app')

@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">My Orders</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My Orders</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
                
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Review</th>
              </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->status}}</td>
                @if($order->status == 'Delivered')
                  <td><a href="{{route('user.review.write')}}" class="btn btn-success">Review</a></td>
                @else
                  <td>Not Delivered Yet</td>
                @endif
              </tr>
            @endforeach
              
            </tbody>
        </table>
      </div>
</div>
<!-- Service End -->

@endsection