@extends('layouts.master')
@section('page-title')
  Programs Management
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show">
                  <p>{{ $message }}</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right">
             <a class="btn btn-success" href="{{ route('program.create') }}"> Add New Program</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">List of Program</h4>
              <p class="card-category">Select action for more information</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="myTable">
                  <thead class=" text-primary">
                    <th>Name
                    <th>Budget
                    <th width="20%">Action
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                      <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->budget}}</td>
                        <td><a class="btn btn-warning btn-sm" href="{{ route('program.edit',$item ?? ''->id) }}"><i class="material-icons">search</i></a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready( function () {
      $('#myTable').DataTable({
          responsive: true
        });
    } );
  </script>
@endpush
