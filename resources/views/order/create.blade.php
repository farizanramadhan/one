@extends('layouts.master')
@section('page-title')
  Create Order
@endsection
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endpush
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
                    <select name="customer_id" class="form-control select2" >
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
                    <select name="project_id" class="form-control select2" >
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
                    <select name="kavling_id" class="form-control select2" >
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
                   <select name="program_id" class="form-control select2" >
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
                       <select name="status" class="form-control select2" >
                           <option value="Call">Call</option>
                           <option value="WalkIn">WalkIn</option>
                           <option value="Meeting">Meeting</option>
                           <option value="Visit">Visit</option>
                           <option value="Booking">Booking</option>
                           <option value="Akad">Akad</option>
                           <option value="Reject">Reject</option>
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

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>
     $(document).ready(function () {
      $('.select2').select2({
            placeholder: 'Cari Provinsi...',
        });

    });
    </script>
@endpush
