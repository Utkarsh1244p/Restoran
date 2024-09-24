@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title d-inline" class="margin-bottom: 10px">Create Admins</h5>
            <form method="POST" action="{{route('admin.store.admin')}}" enctype="multipart/form-data">
              @csrf
                <div class="form-outline mb-4">
                <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Full Name" required />
                </div>

                <div class="form-outline mb-4 mt-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" required />
                </div>

                <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example1" class="form-control" placeholder="Password" required />
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-success  mb-4 text-center">Create</button>
            </form>
        </div>
      </div>
    </div>
  </div>


@endsection