@extends('layouts.master')

@section('page-title')
  Projects Management
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
                <div class="col-md-6"> <h4 class="card-title">List of Projects</h4>
                    <p class="card-category">Select action for more information</p></div>
                <div class="col-md-6"><div class="pull-right ">
                    <a class="btn btn-primary" href="{{ route('project.create') }}"> Add New Project</a>
                 </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table  w-100" id="myTable">
                  <thead class=" text-primary">
                    <th>Project Name
                    <th>Address
                    <th>Availabilty
                    <th>Description
                    <th >Action
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                      <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->availability}}</td>
                        <td>{{$item->description}}</td>
                        <td><a class="btn btn-warning btn-sm btn-round" href="{{ route('project.edit',$item ?? ''->id) }}"><i class="material-icons">edit</i></a></td>
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
