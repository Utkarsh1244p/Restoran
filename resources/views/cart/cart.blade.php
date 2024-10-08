@extends('layouts.app')

@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Cart</a></li>
            </ol>
        </nav>
    </div>
</div>


<div class="container">
    {{-- @if($totalPrice == 0)
        <div class="alert alert-danger" role="alert">
            Your cart is empty
      </div>
    @endif --}}
    @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
    @endif
</div>


<div class="container">
                
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $item)
              <tr>
                <th><img src="{{asset('assets/img/'.$item->image.'')}}" style="width: 60px; height: 60px"></th>
                <td>{{$item->name}}</td>
                <td>${{$item->price}}</td>
                <td><a href="{{route('cart.delete', $item->food_id)}}" class="btn btn-danger text-white">delete</td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
          <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
            <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: ${{$totalPrice}}</p>
            @if($totalPrice > 0)
              <form method="POST" action="{{route('prepare.checkout')}}">
                @csrf
                <input type="hidden" name="price" value="{{$totalPrice}}" />
                <button type="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
              </form>
              {{-- <a href="{{ route('cart.checkout', ['price' => $totalPrice]) }}" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</a> --}}

            @else
                  <button type="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2" disabled>Checkout</button>
                  <div style="width:400px; height:200px;">
                    <p>Your cart is empty. Please add items to your cart to proceed with checkout.</p>
                  </div>
            @endif
        </div>
    </div>
</div>
<!-- Service End -->

@endsection