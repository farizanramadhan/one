@extends('layouts.master')

@section('page-title')
  Order Management
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
          <div class="card">
            <div class="card-header card-header-primary row">
                <div class="col-md-6"> <h4 class="card-title">List of Order</h4>
                    <p class="card-category">Select action for more information</p></div>
                <div class="col-md-6"><div class="pull-right ">
                    <a class="btn btn-secondary" href="{{ route('order.create') }}"> Add New Order</a>
                 </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="myTable">
                  <thead class=" text-primary">
                    <th>KTP
                    <th>Customer
                    <th>Project
                    <th>Kavling
                    <th>Status
                    <th>Creator
                    <th>Action
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                      <tr>
                        <td>{{$item->customer->no_ktp}}</td>
                        <td>{{$item->customer->full_name}}</td>
                        <td>{{$item->project->name}}</td>
                        <td>{{$item->kavling->name}}</td>
                        <td>{{$item->status->name}}</td>
                        <td>{{$item->created_by}}</td>
                        <td>{{-- <a class="btn btn-warning btn-sm btn-round" href="{{ route('order.edit',$item ?? ''->id) }}" title="Edit"><i class="material-icons">edit</i></a> --}}
                        <a class="btn btn-info btn-sm btn-round" href="{{ route('order.show',$item ?? ''->id) }}" title="Show"><i class="material-icons">search</i></a></td>
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
