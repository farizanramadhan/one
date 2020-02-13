@extends('layouts.master')

@section('page-title')
  Order Details
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
            <form action="{{ route('order.update',$order->id) }}" method="POST">
              @csrf
              <input  type="hidden" class="form-control" value="{{Auth::user()->email}}" name="updated_by">

              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Customer</label>
                    <select name="customer_id" class="form-control selectpicker" >
                        @foreach ($customer as $item)
                        @if ($item->id == $order->customer->id)
                            <option selected value="{{$item->id}}">{{$item->full_name}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->full_name}}</option>
                        @endif
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
                        @if ($item->id == $order->project->id)
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
                    <label class="bmd-label-floating">Kavling</label>
                    <select name="kavling_id" class="form-control selectpicker" >
                        @foreach ($kavling as $item)
                        @if ($item->id == $order->kavling->id)
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
                    <label class="bmd-label-floating">Program</label>
                    <select name="program_id" class="form-control selectpicker">
                        @foreach ($program as $item)
                        @if ($item->id == $order->program->id)
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
                    <label class="bmd-label-floating">Status</label>
                    <select name="status" class="form-control selectpicker">
                            <option selected value="{{$order->status}}">{{$order->status}}</option>
                            <option value="Pesan">Pesan</option>
                           <option value="Booking">Booking</option>
                           <option value="Akad">Akad</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Notes</label>
                      <textarea class="form-control" rows="5" name="notes">{{$order->notes}}</textarea>
                  </div>
                </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('order')}}">< Back</a> &nbsp;
              <button type="submit" class="btn btn-info btn-sm pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
{{--     <div class="row">
      <div class="col-md-12">
        <form action="{{ route('order.destroy',$order->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm pull-right">Delete Order</button>
        </form>
      </div>
    </div> --}}
  </div>
</div>
@endsection
