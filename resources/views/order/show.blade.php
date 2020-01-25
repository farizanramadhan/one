@extends('layouts.master')
@section('page-title')
  Show Order
@endsection
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Order Information</h4>
            <p class="card-category">Don't forget to complete all data</p>
          </div>
          <div class="card-body">
         {{--    <form action="{{ route('order.store') }}" method="POST">
              @csrf --}}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Customer</label>
                    <input type="text" class="form-control" value="{{$order->customer->full_name}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Project</label>
                    <input type="text" class="form-control" value="{{$order->project->name}}" disabled>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Kavling</label>
                      <input type="text" class="form-control" value="{{$order->kavling->name}}" disabled>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                      <label class="bmd-label-floating">Jenis Pembelian</label>
                      <input type="text" class="form-control" value="{{$order->type_cash}}" disabled>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Sumber Dana</label>
                        <input type="text" class="form-control" value="{{$order->source_fund}}" disabled>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                      <label class="bmd-label-floating">Alasan Pembelian</label>
                      <input type="text" class="form-control" value="{{$order->motive}}" disabled>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tujuan Pembelian</label>
                        <input type="text" class="form-control" value="{{$order->purpose}}" disabled>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Promo</label>
                        <input type="text" class="form-control" value="{{$order->promo}}" disabled>
                  </div>
                </div>
              </div>
{{--               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Notes</label>
                      <textarea class="form-control" rows="4" name="notes">{{$order->notes}}</textarea>
                  </div>
                </div>
              </div> --}}
             {{--  <button type="submit" class="btn btn-success btn-sm pull-right">Save</button> --}}
              <div class="clearfix"></div>
           {{--  </form> --}}
          </div>
        </div>

        <div class="card">
            <div class="card-header card-header-primary row">
                <div class="col-md-6">
                    <h4 class="card-title">Status of Order</h4>
                    <p class="card-category">Select action for more information</p>
                </div>
                <div class="col-md-6"><div class="pull-right">
              {{--   <a class="btn btn-secondary" href="{{ route('order.status.create') }}"> Change Status</a> --}}
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Change Status</button>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button title="Start" rel="tooltip" type="button" class="btn btn-primary btn-lg btn-round" style="padding:1.125rem;"><i class="material-icons">person</i></button>

                        @foreach ($order->orderHistory as $item)
                         ---->
                        <button title="{{$item->name}}" rel="tooltip" type="button" class="btn btn-primary btn-lg btn-round" style="padding:1.125rem;"><i class="material-icons">person</i></button>
                        @endforeach
                    </div>
                </div>
            </div>
          </div>


      </div>
    </div>
  </div>
</div>
<!-- Modal Add dokumen -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Status
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form method="post" action="{{route('order.history.store')}}">
           <input type="text" name="order_id" class="form-control" value="{{$order->id}}" hidden>
           @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="bmd-label-floating">Status</label>
                    <select name="status" class="form-control ">
                        @foreach ($status as $item)
                        @if ($item->parent == $order->status)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label class="form-label right">Notes</label>
                    <input type="notes" name="name" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- End Modal -->
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
     $(document).ready(function () {
      $('.select2').select2({
        });
    });
    </script>
@endpush
