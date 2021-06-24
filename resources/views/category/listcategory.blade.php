@extends('master')
@section('title', 'รายการหมวดหมู่')
@section('content')

    <div class="container-fluid">

        <!-- /.container-header -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center "> <i class="far fa-newspaper"></i> รายการหมวดหมู่
                        <a href="/category/create" class="btn btn-primary ">
                            <i class="fas fa-plus"></i> เพิ่มหมวดหมู่่</a>
                    </h3><br>
                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 30px" class="text-center">ลำดับ</th>
                                    <th class="text-center" style="width: 200px">ชื่อหมวดหมู่</th>
                                    <th style="width: 200px" class="text-center">รายละเอียด</th>
                                    <th style="width: 200px" class="text-center">วันที่แก้ไขล่าสุด</th>
                                    <th style="width: 200px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($category->count() > 0)
                                    @foreach ($category as $category)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->desc }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td class="text-center"><a href="{{ route('updateCateForm', $category->id) }}"
                                                    class="btn btn-info"><i class="far fa-edit"></i> แก้ไข</a><a> </a>
                                                <a href="{{ route('deleteCate', $category->id) }}"
                                                    class="btn btn-danger"><i class="far fa-trash-alt"></i> ลบ</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="4">
                                        <div class="text-center">ไม่มีข้อมูล</div>
                                    </td>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
