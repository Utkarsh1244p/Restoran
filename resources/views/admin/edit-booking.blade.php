@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Update Booking Status</h5>
          <p>Status is <b>{{$booking->status}}</b></p>
      <form method="POST" action="{{route('admin.update.booking', $booking->id)}}" enctype="multipart/form-data">
        @csrf
            <div class="form-outline mb-4 mt-4">

              <select name="status" class="form-select  form-control" aria-label="Default select example">
                <option selected>Choose Status</option>
                <option value="Processing">Processing</option>
                <option value="Booked">Booked</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </div>

            <br>
          

  
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-success  mb-4 text-center">Change</button>

      
          </form>

        </div>
      </div>
    </div>
  </div>


@endsection