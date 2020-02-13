@extends('layouts.master')

@section('page-title')
  Kavling Details
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    {{-- <div class="row">
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
    </div> --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Information</h4>
            <p class="card-category">Don't forget to complete all mandatory data</p>
          </div>
          <div class="card-body">
            <form action="{{ route('kavling.update',$kavling->id) }}" method="POST">
              @csrf
              <input  type="hidden" class="form-control" value="{{Auth::user()->email}}" name="updated_by">

              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" value="{{$kavling->name}}" name="name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Type</label>
                    <input type="text" name="type" class="form-control"value="{{$kavling->type}}" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <textarea name="address" rows="2" cols="80" class="form-control">{{$kavling->address}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Project</label>
                    <select name="project_id" class="form-control">
                        @foreach ($project as $item)
                        @if ($item->id == $kavling->project_id)
                            <option selected value="{{$item->id}}">{{$item->name}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$kavling->price}}" onfocusin="removemoney(this, event)" onfocusout="money(this, event)" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Location</label>
                    <input type="text" class="form-control" name="location" value="{{$kavling->location}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea class="form-control" rows="5" name="description">{{$kavling->description}}</textarea>
                  </div>
                </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('kavling')}}">Back</a> &nbsp;
              <button type="submit" class="btn btn-info btn-sm pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
{{--     <div class="row">
      <div class="col-md-12">
        <form action="{{ route('kavling.destroy',$kavling->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm pull-right">Delete Kavling</button>
        </form>
      </div>
    </div> --}}
  </div>
</div>
@endsection
