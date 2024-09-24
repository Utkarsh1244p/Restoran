@extends('layouts.app')

@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Review</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Review</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session('success') }}</p>
    @endif
</div>


<div class="container">
                
    <div class="col-md-12 bg-dark">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Review</h5>
            <h1 class="text-white mb-4">Review</h1>
            <form  class="col-md-12" method="POST" action="{{route('user.review.store')}}" autocomplete="off">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{auth()->user()->name}}" readonly>
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                   
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Review" id="review" name="review" style="height: 100px"></textarea>
                            <label for="address">Review</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Submit Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

@endsection