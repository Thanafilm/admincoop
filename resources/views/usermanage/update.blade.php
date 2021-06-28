@extends('master')
@section('title', 'แก้ไข้สิทธิ์การใช้งาน')
@section('content')
    <div class="container-fluid">

        <!-- /.container-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header border-0 pt-4">
                        <h5> <i class="nav-icon fas fa-users-cog"></i> อัปโหลดแกลอรี </h5>
                        <a href="/user/list" class="btn btn-info"><i class="fas fa-list-ul"></i> กลับหน้ารายการ</a>

                    </div><br>
                    <!-- /.card-header -->
                    <div class="container-fluid">
                        <div class="card-body">
                            {!! Form::model($user, ['method' => 'POST', 'route' => ['usersRoleupdate', $user->id]]) !!}
                            <div class="container">

                                    <div class="form-group">
                                        <strong>ชื่อ:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>


                                    <div class="form-group">
                                        <strong>อีเมล์:</strong>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <strong>สิทธิ์การใช้งาน:</strong>
                                        {{ Form::select('roles',  $roles, $userRole, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>


@endsection
