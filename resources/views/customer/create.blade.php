@extends('layouts.master')
@section('page-title')
  Customer Details
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
            <form action="{{ route('customer.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">No KTP</label>
                    <input type="text" id="no_ktp" class="form-control typeahead" name="no_ktp" data-provide="typeahead" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">No NPWP</label>
                      <input type="text" id="no_npwp" class="form-control" name="no_npwp">
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nama Lengkap</label>
                    <input type="text" class="form-control" name="full_name" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Alamat</label>
                    <input type="text" name="address" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="select bmd-label-floating">Pekerjaan</label>
                      <select name="customer_job_id" id="customer_job_id" class="form-control">
                          @foreach ($customerJob as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>

              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Provinsi</label>
                    <select name="province" id="province" class="form-control select2">
                      @foreach ($provinsi as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Kota</label>
                    <select name="city" id="city" class="form-control select2">
                      <option value="">Please Select Provinsi First</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Kecamatan</label>
                    <select name="distric" id="distric" class="form-control select2">
                      <option value="">Please Select Kota First</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">No Telepon</label>
                    <input type="text" class="form-control" name="phone" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control" name="email" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Penghasilan</label>
                    <input type="text" class="form-control" name="income" onfocusin="removemoney(this, event)" onfocusout="money(this, event)" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="select bmd-label-floating">Sumber Informasi</label>
                    <select name="program_id" id="program_id" class="form-control">
                        @foreach ($programs as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea class="form-control" rows="3" name="description" ></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-warning btn-sm pull-left" href="{{url('customer')}}">Back</a> &nbsp;
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
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.select2').select2({
        placeholder: 'Cari Data...',
    });
  /*   $('#program_id').select2({
        placeholder: 'Cari Sumber',
    }); */
    //untuk autocomplete no ktp, asu gagal terus
    var path = "{{ route('customer.getKtp') }}";
    $('#no_ktp .typeahead').typeahead(null,{
        name:'KTP',
        source: function (query, process) {
                return $.getJSON(path,
                    { query: query },
                    function (data) {
                        console.log(data)
                        return process(data);
                    })
            },
    });


    $('#province').trigger("change");
  });
  $("#province").change(function () {
    console.log(this.value);
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('customer.getCity')}}",
            data: "q=" + this.value,
            success: function (mag) {
                $('#city').empty();
                $("#city").select2({
                    data: $.map(mag, function (item) {
                        return {
                            text: item.name ,
                            id: item.id
                        }
                    })
                });
                $('#city').trigger("change");

            },
            error: function (err) {
                console.log(err);
            },
        });
    });
    $("#city").change(function () {
        console.log();

        if (this.value != null) {
            $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('customer.getDistric')}}",
            data: "q=" + this.value,
            success: function (mag) {
                $('#distric').empty();
                $("#distric").select2({
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
        }

    });
  function confirm(id,row) {
    Swal.fire(
    {
        title: "Are you sure Change Status?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Change Status",
        reverseButtons: true
    }).then(function(result)
    {
        if(result.value){

        }else{

        }
    });
  }
</script>
@endpush
