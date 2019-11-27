@extends('layouts.master')

@section('page-title')
  Users Management
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">List of Users</h4>
            <p class="card-category">Select action for more options</p>
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
                    Email
                  </th>
                  <th>
                    Phone
                  </th>
                  <th width="20%">
                    Action
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Dakota Rice
                    </td>
                    <td>
                      dakota@email.com
                    </td>
                    <td>
                      12353465753
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      <a class="btn btn-danger btn-sm" href="#"><i class="material-icons">loop</i></a>
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
                      minerva@email.com
                    </td>
                    <td>
                      2352463452
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      <a class="btn btn-danger btn-sm" href="#"><i class="material-icons">loop</i></a>
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
                      sage@email.com
                    </td>
                    <td>
                      2352463452
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      <a class="btn btn-danger btn-sm" href="#"><i class="material-icons">loop</i></a>
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
                      philip@email.com
                    </td>
                    <td>
                      2352463452
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      <a class="btn btn-danger btn-sm" href="#"><i class="material-icons">loop</i></a>
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
                      doris@email.com
                    </td>
                    <td>
                      2352463452
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      <a class="btn btn-danger btn-sm" href="#"><i class="material-icons">loop</i></a>
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
                      Chile
                    </td>
                    <td>
                      Gloucester
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="#"><i class="material-icons">search</i></a>
                      <a class="btn btn-danger btn-sm" href="#"><i class="material-icons">loop</i></a>
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
