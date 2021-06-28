@extends('master')
@section('title', 'รายการสถานประกอบการ')
@section('content')

    <!-- /.container-header -->
    <div class="container-fluid">

        <!-- /.container-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border-0 pt-3">
                        <h4><i class="fas fa-building"></i> รายชื่อสถานประกอบการ </h4>
                        <a href="/company/create" class="btn btn-primary ">
                            <i class="fas fa-plus"></i> เพิ่มสถานประกอบการ</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="container-fluid">
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">ลำดับ</th>
                                        <th style="width: 500px" class="text-center">ชื่อสถานประกอบการ</th>
                                        <th style="width: 200px" class="text-center">ที่ตั้งสถานประกอบการ</th>
                                        <th style="width: 200px" class="text-center">ปีการศึกษา</th>
                                        <th style="width: 200px" class="text-center">สาขาที่รองรับ</th>
                                        <th style="width: 200px" class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($corp->count() > 0)
                                        @foreach ($corp as $new)
                                            <tr>
                                                <td class="text-center"> {{ $loop->index + 1 }} </td>
                                                <td>{{ $new->corpname }}</td>
                                                <td class="text-center">{{ $new->address }}</td>
                                                <td class="text-center">{{ $new->year }}</td>
                                                <td class="text-center">
                                                    @foreach (json_decode($new->suppbranch) as $saka)
                                                        <a>{{ $saka }},</a>
                                                    @endforeach

                                                </td>
                                                <td class="text-center"><a
                                                        href="{{ route('Company.Edit.Form', $new->id) }}"
                                                        class="btn btn-info"><i class="far fa-edit"></i> แก้ไข</a><a> </a>
                                                    <a href="{{ route('news.Delete', $new->id) }}"
                                                        class="btn btn-danger"><i class="far fa-trash-alt"></i> ลบ</a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif
                                </tbody>

                            </table>

                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>
@endsection
