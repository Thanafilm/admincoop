@extends('master')
@section('title', 'รายการหมวดหมู่ย่อย')
@section('content')
    <div class="container-fluid">


        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center "> <i class="far fa-newspaper"></i> รายการหมวดหมู่ย่อย
                        <a href="/subcate/create" class="btn btn-primary ">
                            <i class="fas fa-plus"></i> เพิ่มหมวดหมู่ย่อย</a>
                    </h3><br>
                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    {{-- <th style="width: 10px" class="text-center">ลำดับ</th> --}}
                                    <th class="text-center" style="width: 200px">ชื่อหมวดหมู่หลัก</th>
                                    <th style="width: 200px" class="text-center">ชื่อหมวดหมู่ย่อย</th>
                                    <th style="width: 200px" class="text-center">วันที่แก้ไขล่าสุด</th>
                                    <th style="width: 200px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($sub->count() > 0)
                                    @foreach ($sub as $sub)
                                        <tr>
                                            <td>
                                                @if ($sub->category_id === 1)
                                                    สหกิจ
                                                @else
                                                    ฝึกงาน
                                                @endif
                                            </td>
                                            <td>{{ $sub->name }}</td>
                                            {{-- <td>{{ date('d F Y', strtotime($sub->updated_at)) }}</td> --}}
                                            <td>{{ DateThai($sub->updated_at) }}</td>
                                            <td><a href="{{ route('upDatesubcate', $sub->id) }}" class="btn btn-info"><i
                                                        class="far fa-edit"></i> แก้ไข</a><a> </a>
                                                <a href="{{ route('deleteSubcate', $sub->id) }}" class="btn btn-danger"><i
                                                        class="far fa-trash-alt"></i> ลบ</a>
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
