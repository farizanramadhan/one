@extends('layouts.master')

@section('page-title')
  Kavling Management
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
                <div class="col-md-6"> <h4 class="card-title">List of Kavling</h4>
                    <p class="card-category">Select action for more information</p></div>
                <div class="col-md-6"><div class="pull-right ">
                    <a class="btn btn-warning" href="{{ route('kavling.create') }}"> Add New Kavling</a>
                 </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table w-100" id="myTable">
                  <thead class=" text-primary">
                    <th>Kavling Name
                    <th>Type
                    <th>Project
                        <th>Address
                        <th>Status
                    <th >Action
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                      <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->project->name}}</td>
                        <td>{{$item->address}}</td>

                        <td>{{$item->status->name}}</td>
                        <td><a class="btn btn-warning btn-sm btn-round" href="{{ route('kavling.edit',$item ?? ''->id) }}"><i class="material-icons">edit</i></a></td>
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
     /*  $('#myTable').DataTable({
          responsive: true
        }); */
    } );
  </script>
@endpush
