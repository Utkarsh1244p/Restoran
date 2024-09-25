@extends('layouts.admin')

@section('content')


  @if(Session::has('success'))
    <p class="alert alert-success">{{ Session('success') }}</p>
  @endif


<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
       <a  href="{{route('admin.create.admin')}}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($admins as $admin)
            <tr>
              <th scope="row">{{$admin->id}}</th>
              <td>{{$admin->name}}</td>
              <td>{{$admin->email}}</td>
              <td>
                <a href="{{route('admin.delete.admin', $admin->id)}}" class="btn btn-danger">Delete</a>
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