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
            <form action="{{ route('order.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Customer</label>
                    <select name="customer_id" class="form-control selectpicker" >
                        @foreach ($customer as $item)
                         <option value="{{$item->id}}">{{$item->full_name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Project</label>
                    <select name="project_id" class="form-control selectpicker" >
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
                    <label class="bmd-label-floating">Kavling</label>
                    <select name="kavling_id" class="form-control selectpicker" >
                        @foreach ($kavling as $item)
                         <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                    <label class="bmd-label-floating">Program</label>
                   <select name="program_id" class="form-control selectpicker" >
                       @foreach ($program as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                       @endforeach
                   </select>
                  </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                        <label class="bmd-label-floating">Status</label>
                       <select name="status" class="form-control selectpicker" >
                           <option value="Pesan">Pesan</option>
                           <option value="Booking">Booking</option>
                           <option value="Akad">Akad</option>
                          {{--  @foreach ($program as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                           @endforeach --}}
                       </select>
                      </div>
                      </div>
                    </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">Notes</label>
                      <textarea class="form-control" rows="5" name="notes" ></textarea>
                    </div>
                  </div>
                </div>
              </div>
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
