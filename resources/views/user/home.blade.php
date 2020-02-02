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
                            <table id="myTable"class="table w-100">
                                <thead class=" text-primary">
                                    <th> No
                                    <th> Name
                                    <th> Email
                                    <th> Phone
                                    <th> Role
                                        <th> Status
                                    <th > Action
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td> {{$item->id}}
                                        <td> {{$item->name}}
                                        <td> {{$item->email}}
                                        <td> {{$item->phone}}
                                        <td> {{$item->role == 1 ? "Admin" : ($item->role == 2 ? "Sales" : ($item->role == 3 ? "Marketing" : "Undefined")) }}
                                        <td>@if ($item->status)
                                            <a class="btn btn-danger btn-sm btn-round" href="#" onclick="updateRole('{{$item->id}}',this)" data-toggle="tooltip" title="Disable"><i class="material-icons">lock</i></a>
                                        @else
                                            <a class="btn btn-success btn-sm btn-round" href="#" onclick="updateRole('{{$item->id}}',this)"data-toggle="tooltip" title="Enable"><i class="material-icons">lock</i></a>
                                        @endif
                                        <td> <a class="btn btn-warning btn-sm btn-round" href="{{route('user.edit',$item->id)}}"><i class="material-icons">search</i></a>
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
<script>
    $(document).ready( function () {
      $('#myTable').DataTable({
          responsive: true
        });
    } );
function updateRole(id,row) {
    Swal.fire(
    {
        title: "Are you sure Change Status?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Change Status",
        reverseButtons: true
    }).then(function(result)
    {
        if(result.value){
            $.ajax({
                type: "GET",
                url: "{{url('user/updaterole')}}/" + id,
                success: function (data) {
                    if(data.role){
                        Swal.fire('Unlocked','User has been unlocked.','success');
                        $(row).parents("td").last().html('<a class="btn btn-danger btn-sm" href="#" onclick="updateRole('+data.id+',this)" data-toggle="tooltip" title="Disable"><i class="material-icons">lock</i><div class="ripple-container"></div></a>');
                    }else{
                        Swal.fire('Locked','User has been Locked.','success');
                        $(row).parents("td").last().html('<a class="btn btn-success btn-sm" href="#" onclick="updateRole('+data.id+',this)" data-toggle="tooltip" title="Disable"><i class="material-icons">lock_open</i><div class="ripple-container"></div></a>');
                    }
                },
                error: function (err) {
                    console.log(err);
                },
            });
        }else{
        }
    });
  }
</script>
@endpush
