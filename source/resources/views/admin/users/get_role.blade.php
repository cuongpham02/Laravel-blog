@extends('admin.admin_layout')
@section('admin_content')
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
        <div class="col-lg-8">
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
                    <form action="{{route('admin.update-role-user', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Role Name</th>
                                <th>Permission</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>
                                    <input {{$role_user->contains($role->id) ? 'checked' : ''}}
                                        type="checkbox"
                                        class="form-check-input" name="role[]" value="{{ $role->id }}">
                                    <label class="form-check-label" >{{ $role->name }}</label>
                                </td>
                                <td>
                                    <?php $data = []; ?>
                                    @foreach ($role->permissions->toArray() as $item)
                                    <?php $data[] = $item['name'];?>
                                    @endforeach
                                    {{ implode(', ', $data) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <?php if(!empty($roles)) {?>
                        <button type="submit" class="btn btn-success">Update User</button>
                    <?php }?>
                    </form>
                </div> <!-- end table-responsive-->

            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
</div>
@endsection