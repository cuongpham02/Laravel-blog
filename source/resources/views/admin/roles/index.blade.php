@extends('admin.admin_layout')
@section('admin_content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <!-- <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">List user</li>
                    </ol> -->
                </div>
                <h4 class="page-title">List Role</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-10">
        <a href="{{route('admin.create-role')}}" class="btn btn-sm btn-success">Add Role</a>
            <div class="card-box">
                <?php
                $message = session('message');
                if ($message) {
                    echo '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">'
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span>'
                        . '</button>'
                        . $message
                        . '</div>';
                    session(['message' => 'null']);
                }
                ?>
                <!-- <h4 class="header-title">List User</h4> -->

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <th>{{$role->id}}</th>
                                <td>{{$role->name}}</td>
                                <td style="white-space: nowrap; width: 1%;">
                                    <div style="text-align: left;">
                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <a type="button" href="{{route('admin.edit-role',$role->id)}}" class="btn btn-success" style="float: none;"><span class="mdi mdi-pencil"></span></a>
                                            <form action="{{route('admin.delete-role', $role->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" style="float: none;"><span class="mdi mdi-trash-can"></span></a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
</div>
@endsection