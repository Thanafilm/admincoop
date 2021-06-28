@extends('master')
@section('title', 'รายการผู้ใช้งาน')
@section('content')
    <div class="container-fluid">

        <!-- /.container-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-users-cog"></i> รายชื่อผู้ใช้งาน </h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="container-fluid">
                        <div class="card-body">


                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">ลำดับ</th>
                                        <th style="width: 500px" class="text-center">ชื่อ</th>
                                        <th style="width: 200px" class="text-center">อีเมล์</th>
                                        <th style="width: 200px" class="text-center">Role</th>
                                        <th style="width: 200px" class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->count() > 0)
                                        @foreach ($data as $user)
                                            <tr>
                                                <td class="text-center"> {{ $loop->index + 1 }} </td>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @if ($user->getRoleNames() != null)
                                                        @foreach ($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td >
                                                <td  class="text-center">
                                                    <a class="btn btn-primary" href="{{ route('UserROleForm',$user->id) }}">แก้ไข</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif
                                </tbody>

                            </table><br>

                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>
@endsection
