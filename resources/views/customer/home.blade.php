@extends('layouts.master')

@section('page-title')
  Customers Management
@endsection
@push('style')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet" />
@endpush
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
                <div class="col-md-6"> <h4 class="card-title">List of Customers</h4>
                    <p class="card-category">Select action for more information</p></div>
                <div class="col-md-6"><div class="pull-right ">
                    <a class="btn btn-info" href="{{ route('customer.create') }}"> Add New Customer</a>
                 </div></div>
            </div>
            <div class="card-body">
                 <div class="table-responsive">
                    <table class="table dt-responsive" id="myTable">
                    <thead >
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                        </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->full_name}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->distrik->name}}</td>
                            <td>
                            <a class="btn btn-info btn-sm btn-round" href="{{ route('customer.show',$customer ?? ''->id) }}" title="Show"><i class="material-icons">search</i></a>
                            <a class="btn btn-warning btn-sm btn-round" href="{{ route('customer.edit',$customer->id) }}"><i class="material-icons">edit</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                 </div> 
           {{--     <div style="float: right;">{!! $customers->render() !!}</div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
     $('#myTable').DataTable({
        responsive: true
      });
  } );
</script>
@endpush
