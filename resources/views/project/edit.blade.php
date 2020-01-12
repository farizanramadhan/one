@extends('layouts.master')

@section('page-title')
  Project Details
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
            <form action="{{ route('project.update',$project->id) }}" method="POST">
              @csrf
              <input  type="hidden" class="form-control" value="{{Auth::user()->email}}" name="updated_by">

              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Full Name</label>
                    <input type="text" class="form-control" value="{{$project->name}}" name="name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <textarea name="address" rows="5" cols="80" class="form-control">{{$project->address}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Availability</label>
                    <input type="text" class="form-control" value="{{$project->availability}}" name="availability">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea class="form-control" rows="5" name="description">{{$project->description}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('project')}}">< Back</a> &nbsp;
              <button type="submit" class="btn btn-success btn-sm pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('project.destroy',$project->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm pull-right">Delete Project</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
