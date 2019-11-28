@extends('layouts.master')

@section('page-title')
  Customers Management
@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right">
             <a class="btn btn-success" href="{{ route('customer.create') }}"> Add New Customer</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">List of Customers</h4>
              <p class="card-category">Select action for more information</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      No
                    </th>
                    <th>
                      Full Name
                    </th>
                    <th>
                      Phone
                    </th>
                    <th>
                      Address
                    </th>
                    <th width="20%">
                      Action
                    </th>
                  </thead>
                  <tbody>
                    @foreach($customers as $customer)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$customer->full_name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address}}</td>
                        <td><a class="btn btn-warning btn-sm" href="{{ route('customer.edit',$customer->id) }}"><i class="material-icons">search</i></a></td>
                      </tr>
                    @endforeach
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                        Dakota Rice
                      </td>
                      <td>
                        081223789329
                      </td>
                      <td>
                        Oud-Turnhout
                      </td>
                      <td>
                        <!-- {{ route('customer.edit',$customer->id) }} -->
                        <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>
                        Minerva Hooper
                      </td>
                      <td>
                        081223789329
                      </td>
                      <td>
                        Sinaai-Waas
                      </td>
                      <td>
                        <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td>
                        Sage Rodriguez
                      </td>
                      <td>
                        081223789329
                      </td>
                      <td>
                        Baileux
                      </td>
                      <td>
                        <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td>
                        Philip Chaney
                      </td>
                      <td>
                        081223789329
                      </td>
                      <td>
                        Overland Park
                      </td>
                      <td>
                        <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        5
                      </td>
                      <td>
                        Doris Greene
                      </td>
                      <td>
                        081223789329
                      </td>
                      <td>
                        Feldkirchen in Kärnten
                      </td>
                      <td>
                        <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        6
                      </td>
                      <td>
                        Mason Porter
                      </td>
                      <td>
                        081223789329
                      </td>
                      <td>
                        Gloucester
                      </td>
                      <td>
                        <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      </td>
                    </tr>
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
