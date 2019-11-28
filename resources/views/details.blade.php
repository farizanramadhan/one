@extends('layouts.master')

@section('page-title')
  Customer Details
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="{{asset('img/faces/marc.jpg')}}" />
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title">{{$customer->full_name}}</h4>
            <p class="card-description">
              {{$customer->description}}
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Information</h4>
            <p class="card-category">Don't forget to complete all mandatory data</p>
          </div>
          <div class="card-body">
            <form action="{{ route('customer.update',$customer->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Full Name</label>
                    <input type="text" class="form-control" value="{{$customer->full_name}}" name="full_name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <textarea name="address" rows="5" cols="80" class="form-control">{{$customer->address}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="text" class="form-control" value="{{$customer->phone}}" name="phone">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="text" class="form-control" value="{{$customer->email}}" name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea class="form-control" rows="5" name="description">{{$customer->description}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('customer')}}">< Back</a> &nbsp;
              <button type="submit" class="btn btn-success btn-sm pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('customer.destroy',$customer->id) }}" method="POST">
          <button type="submit" class="btn btn-danger btn-sm pull-right">Delete Customer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
