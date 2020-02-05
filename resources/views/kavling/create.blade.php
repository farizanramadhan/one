@extends('layouts.master')
@section('page-title')
  Kavling Details
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Input Information</h4>
            <p class="card-category">Don't forget to complete all data</p>
          </div>
          <div class="card-body">
            <form action="{{ route('kavling.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Type</label>
                    <input type="text" class="form-control" name="type" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <textarea name="address" rows="2" cols="80" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                    <label class="bmd-label-floating">Project</label>
                   <select name="project_id" class="form-control" >
                       @foreach ($project as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                       @endforeach
                   </select>
                  </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Price</label>
                        <input type="text" class="form-control" name="price" onfocusin="removemoney(this, event)" onfocusout="money(this, event)">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Location</label>
                        <input type="text" class="form-control" name="location" disabled>
                      </div>
                    </div>
                  </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea class="form-control" rows="5" name="description" ></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('kavling')}}">Back</a> &nbsp;
              <button type="submit" class="btn btn-success btn-sm pull-right">Save</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
