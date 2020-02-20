@extends('layouts.master')
@section('page-title')
  Program Details
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
            <form action="{{ route('program.store') }}" method="POST">
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
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Budget</label>
                    <input type="text" class="form-control" name="budget" onfocusin="removemoney(this, event)" onfocusout="money(this, event)">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="select bmd-label-floating">Project</label>
                       <select name="project_id" class="form-control" >
                           @foreach ($project as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                           @endforeach
                       </select>
                      </div>
                  </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('program')}}">Back</a> &nbsp;
              <button type="submit" class="btn btn-info btn-sm pull-right">Save</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
