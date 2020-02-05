@extends('layouts.master')

@section('page-title')
  Customers Management
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
                <div class="col-md-6"> <h4 class="card-title">List of Customers</h4>
                    <p class="card-category">Select action for more information</p></div>
                <div class="col-md-6"><div class="pull-right ">
                    <a class="btn btn-warning" href="{{ route('customer.create') }}"> Add New Customer</a>
                 </div></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                    <thead >
                        <th>Full Name
                        <th>Phone
                        <th>Email
                        <th>Address
                        <th>Action
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
               <div style="float: right;">{!! $customers->render() !!}</div>
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
  /*   $('#myTable').DataTable({
        responsive: true
      }); */
  } );
</script>
@endpush
