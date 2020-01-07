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
                                    <th> No
                                    <th> Name
                                    <th> Email
                                    <th> Phone
                                    <th> Role
                                        <th> Status
                                    <th width="20%"> Action
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td> {{$item->id}}
                                        <td> {{$item->name}}
                                        <td> {{$item->email}}
                                        <td> {{$item->phone}}
                                        <td> {{$item->role}}
                                        <td> {{$item->status ? "Enable":"Disable"}}
                                        <td> <a class="btn btn-warning btn-sm" href="{{route('user.edit',$item->id)}}"><i
                                                    class="material-icons">search</i></a>
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
