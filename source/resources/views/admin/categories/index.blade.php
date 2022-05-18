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
                        <li class="breadcrumb-item active">List Category</li>
                    </ol> -->
                </div>
                <h4 class="page-title">List Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <!-- <h4 class="header-title">List Category</h4> -->
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

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th>{{$category['id']}}</th>
                                <td>
                                    {{$category['name']}}
                                </td>
                                <td>
                                    @if ($category['status'] == 1)
                                    <p class="badge badge-primary">Enable</p>
                                    @else
                                    <p class="badge badge-danger">Disable</p>
                                    @endif
                                </td>
                                <td>{{$category['created_at']}}</td>
                       

                                <td style="white-space: nowrap; width: 1%;">
                                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <a type="button" href="{{route('admin.edit-category',$category['id'])}}" class="tabledit-edit-button btn btn-success" style="float: none;"><span class="mdi mdi-pencil"></span></a>
                                            <form action="{{route('admin.delete-category', $category['id'])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete')" class="tabledit-edit-button btn btn-danger" style="float: none;"><span class="mdi mdi-trash-can"></span></a>
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

        <div class="row">
            <div class="col-sm-5 text-center">
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                {!! $paginateCategory->links() !!}
            </div>
        </div>
    </div> <!-- container -->
</div>
@endsection