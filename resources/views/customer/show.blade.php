@extends('layouts.master')
@section('page-title')
  Customer Details
@endsection
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('css/timeline.css')}}" rel="stylesheet" />

@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary row">
                <div class="col-md-6">
                    <h4 class="card-title">Show Customer Information</h4>
                    <p class="card-category">Don't forget to check all mandatory data</p>
                </div>
                <div class="col-md-6"><div class="pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Change Status</button>
                </div>
                </div>
            </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">No KTP</label>
                    <input type="text" id="no_ktp" class="form-control typeahead" name="no_ktp" data-provide="typeahead" value="{{$customer->no_ktp}}" disabled>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">No NPWP</label>
                      <input type="text" id="no_npwp" class="form-control" name="no_npwp" value="{{$customer->no_npwp}}" disabled>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nama Lengkap</label>
                    <input type="text" class="form-control" name="full_name" value="{{$customer->full_name}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{$customer->address}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Provinsi</label>
                    <input type="text" class="form-control" name="province" value="{{$province->name}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Kota</label>
                    <input type="text" class="form-control" name="city" value="{{$city->name}}" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Kecamatan</label>
                    <input type="text" class="form-control" name="distric" value="{{$district->name}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">No Telepon</label>
                    <input type="text" class="form-control" name="phone" value="{{$customer->phone}}" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$customer->email}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Penghasilan</label>
                    <input type="text" class="form-control" name="income" onfocusin="removemoney(this, event)" onfocusout="money(this, event)" value="{{$customer->income}}" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sumber Informasi</label>
                    <input type="program_id" class="form-control" name="email" value="{{$customer->program->name}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea class="form-control" rows="3" name="description" disabled>{{$customer->description}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="card">
            <div class="card-header card-header-primary row">
                <div class="col-md-6">
                    <h4 class="card-title">Show Customer Information</h4>
                    <p class="card-category">Don't forget to check all mandatory data</p>
                </div>
                <div class="col-md-6"><div class="pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Change Status</button>
                </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="display:inline-block;width:80%;overflow-y:auto;">
                            <ul class="timeline timeline-horizontal">
                                @foreach ($listStatus as $item)
                                <li class="timeline-item">
                                    <div class="timeline-badge primary"><i class="material-icons">person</i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">{{$item->status}}</h3>
                                            <p><small class="text-muted" style="font-size: 80%;">
                                                <i style="vertical-align: middle;font-size: 15px;"
                                                    class="material-icons">map</i> {{$item->project}}
                                            </small> <br>
                                                <small class="text-muted" style="font-size: 80%;">
                                                    <i style="vertical-align: middle;font-size: 15px;"
                                                        class="material-icons">watch_later</i> {{$item->created_at}}
                                                </small> <br>
                                            <small class="text-muted" style="font-size: 80%;">
                                                    <i style="vertical-align: middle;font-size: 15px;"
                                                        class="material-icons">person</i> {{$item->created_by}}
                                                </small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{$item->result}}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
<!-- Modal Add Histori Followup -->
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
           <input type="text" name="customer_id" class="form-control" value="{{$customer->id}}" hidden>
           @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="bmd-label-floating">Project</label>
                    <select name="project" class="form-control ">
                        @foreach ($projects as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="bmd-label-floating">Status</label>
                    <select name="status" class="form-control ">
                            <option value="Call In">Call In</option>
                            <option value="Visiting">Visiting</option>
                            <option value="Site Visit">Site Visit</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label class="form-label right">Result</label>
                    <input type="text" name="result" class="form-control">
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
