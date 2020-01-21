@extends('layouts.master')

@section('page-title')
  Customer Details
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
            <form action="{{ route('customer.update',$customer->id) }}" method="POST">
              @csrf
              <input  type="hidden" class="form-control" value="{{Auth::user()->email}}" name="updated_by">

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
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Provinsi</label>
                    <select name="province" id="province" class="form-control select2">
                      @foreach ($provinsi as $item)
                      @if ($item->id==$customer->province)
                      <option value="{{$item->id}}" selected>{{$item->name}}</option>
                      @else
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Kota</label>
                    <select name="city" id="city" class="form-control select2">
                        <option value="{{$customer->distric}}" selected>{{$customer->distric}}</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Kecamatan</label>
                    <select name="distric" id="distric" class="form-control select2">
                        <option value="{{$customer->distric}}" selected>{{$customer->distric}}</option>

                    </select>
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
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm pull-right">Delete Customer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
