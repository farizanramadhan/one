@extends('layouts.master')
@section('page-title')
  Program Details
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
            <form action="{{ route('program.update',$program->id) }}" method="POST">
              @csrf
              <input  type="hidden" class="form-control" value="{{Auth::user()->email}}" name="updated_by">

              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" value="{{$program->name}}" name="name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Budget</label>
                    <input type="text" name="budget" class="form-control"value="{{$program->budget}}" onfocusin="removemoney(this, event)" onfocusout="money(this, event)" >
                  </div>
                </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('program')}}">Back</a> &nbsp;
              <button type="submit" class="btn btn-info btn-sm pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('program.destroy',$program->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm pull-right">Delete Program</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
