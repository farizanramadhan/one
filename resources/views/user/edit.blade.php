@extends('layouts.master')
@section('page-title')
  User Details
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Information</h4>
            <p class="card-category">Don't forget to complete all mandatory data</p>
          </div>
          <div class="card-body">
            <form action="{{ route('user.update',$user->id) }}" method="POST">
              @csrf
              <input  type="hidden" class="form-control" value="{{Auth::user()->email}}" name="updated_by">
              @method('PUT')
                <div class="form-row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" value="{{$user->name}}" name="name">
                  </div>
                    <div class="form-group col-md-6 col-sm-12">
                      <label class="bmd-label-floating">Email</label>
                      <input type="email" name="email"  class="form-control" value="{{$user->email}}">
                    </div>
                </div>
              <div class="form-row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="text" name="phone"  class="form-control" value="{{$user->phone}}">
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label for="role" class="select">Role</label>
                    <select name="role" id="role" class="form-control">
                        @if ($user->role == 1 )
                        <option selected value="1">Admin</option>
                        <option value="2">Sales</option>
                        <option value="3">Marketing</option>
                        @elseif($user->role == 2)
                        <option value="1">Admin</option>
                        <option selected value="2">Sales</option>
                        <option value="3">Marketing</option>
                        @else
                        <option value="1">Admin</option>
                        <option value="2">Sales</option>
                        <option selected value="3">Marketing</option>
                        @endif
                    </select>
                  </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('user')}}">< Back</a> &nbsp;
              <button type="submit" class="btn btn-success btn-sm pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
{{--     <div class="row">
      <div class="col-md-12">
        <form action="{{ route('user.destroy',$user->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm pull-right">Delete User</button>
        </form>
      </div>
    </div> --}}
  </div>
</div>
@endsection
