@extends('layouts.admin')

@section('content')


  @if(Session::has('success'))
    <p class="alert alert-success">{{ Session('success') }}</p>
  @endif


<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">All Bookings</h5>
       {{-- <a  href="#" class="btn btn-primary mb-4 text-center float-right">Create Booking</a> --}}
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Date & Time</th>
              <th scope="col">Number of People</th>
              <th scope="col">Request</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($bookings as $booking)
            <tr>
              <th scope="row">{{$booking->id}}</th>
              <td>{{$booking->name}}</td>
              <td>{{$booking->email}}</td>
              <td>{{$booking->date}}</td>
              <td>{{$booking->num_of_people}}</td>
              <td>{{$booking->request}}</td>
              <td>{{$booking->status}}</td>
              <td>
                <a href="{{route('admin.edit.booking', $booking->id)}}" class="btn btn-warning text-white">Change Status</a>
              </td>
              <td>
                <a href="{{route('admin.delete.booking', $booking->id)}}" class="btn btn-danger text-white">Delete</a>
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