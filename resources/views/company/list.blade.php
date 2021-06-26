@extends('master')
@section('title', 'รายการสถานประกอบการ')
@section('content')

    <!-- /.container-header -->
    <div class="container-fluid">

        <!-- /.container-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-building"></i> รายชื่อสถานประกอบการ <a href="/company/create"
                                class="btn btn-primary ">
                                <i class="fas fa-plus"></i> เพิ่มสถานประกอบการ</a></h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="container-fluid">
                        <div class="card-body">
                            <div>
                                <div class="mx-auto pull-right">
                                    <div class="">
                                        <form action="/company/list" method="GET" role="search">
                                            <div class="input-group">
                                                <span class="input-group-btn mr-5 mt-1">
                                                    <button class="btn btn-info" type="submit" title="Search projects">
                                                        <span class="fas fa-search"></span>
                                                    </button>
                                                </span>
                                                <input type="text" class="form-control mr-2" name="term"
                                                    placeholder="ค้นหาสถานประกอบการ" id="term">
                                                <a href="/company/list" class=" mt-1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                                            <span class="fas fa-sync-alt"></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <table id="example2" class="table table-bordered table-hover">
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
                                    @else
                                        <td colspan="6">
                                            <div class="text-center">ไม่มีข้อมูล</div>
                                        </td>
                                    @endif
                                </tbody>

                            </table><br>
                            {!! $corp->links() !!}
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>
@endsection
