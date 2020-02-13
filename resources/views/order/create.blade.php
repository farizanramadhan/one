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
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Project</label>
                    <select id="project_id" name="project_id" class="form-control select2" >
                        <option value="">Please Select Project </option>
                        @foreach ($project as $item)
                         <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Kavling</label>
                      <select id="kavling_id" name="kavling_id" class="form-control select2" >
                        <option value="">Please Select Project First</option>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                      <label class="bmd-label-floating">Jenis Pembelian</label>
                      <select name="type_cash" class="form-control select2" >
                         <option value="KPR">KPR</option>
                         <option value="Soft Cash">Soft Cash</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Sumber Dana</label>
                        <select name="source_fund" class="form-control select2" >
                           <option value="Pendapatan">Pendapatan</option>
                           <option value="Warisan">Warisan</option>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="form-group">
                      <label class="bmd-label-floating">Alasan Pembelian</label>
                      <select name="motive" class="form-control select2" >
                         <option value="DP Ringan">DP Ringan</option>
                         <option value="Harga Murah">Harga Murah</option>
                         <option value="Cicilan Ringan">Cicilan Ringan</option>
                         <option value="Lokasi Strategis">Lokasi Strategis</option>
                         <option value="Desain Bagus">Desain Bagus</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tujuan Pembelian</label>
                        <select name="purpose" class="form-control select2" >
                           <option value="living">Hunian</option>
                           <option value="invest">Investasi</option>
                      </select>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Promo</label>
                      <input type="text" name="promo" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Notes</label>
                      <input type="text" name="notes" class="form-control">
                  </div>
                </div>
              </div>
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
@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
     $(document).ready(function () {
      $('.select2').select2({
        });
        $("#project_id").change(function () {
        console.log(this.value);
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('project.getKavling')}}",
            data: "q=" + this.value,
            success: function (mag) {

                $('#kavling_id').empty().trigger("change");
                $("#kavling_id").select2({
                    data: $.map(mag, function (item) {
                        return {
                            text: item.name ,
                            id: item.id
                        }
                    })
                })

            },
            error: function (err) {
                console.log(err);
            },
        });
    });
    });

    </script>
@endpush
