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
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">No KTP</label>
                    <input type="text" id="no_ktp" class="form-control typeahead" name="no_ktp" data-provide="typeahead" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Full Name</label>
                    <input type="text" class="form-control" name="full_name" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <textarea name="address" rows="5" cols="80" class="form-control" ></textarea>
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
                    <select name="city" id="city" class="form-control">
                      <option value="">Please Select Provinsi First</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Kecamatan</label>
                    <select name="distric" id="distric" class="form-control">
                      <option value="">Please Select Kota First</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea class="form-control" rows="5" name="description" ></textarea>
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
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
        $('#provinsi').select2({
            placeholder: 'Cari Provinsi...',
        });
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
                $('#city').empty().trigger("change");
                $("#city").select2({
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
    $("#city").change(function () {
      console.log(this.value);
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('customer.getDistric')}}",
            data: "q=" + this.value,
            success: function (mag) {
                $('#distric').empty().trigger("change");
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
    });
  });
  
</script>
@endpush
