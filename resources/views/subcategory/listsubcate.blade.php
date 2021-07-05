@extends('master')
@section('title', 'รายการหมวดหมู่ย่อย')
@section('content')
    <div class="container-fluid">


        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4> <i class="far fa-newspaper"></i> รายการหมวดหมู่ย่อย</h4>
                    <a href="/subcate/create" class="btn btn-primary ">
                        <i class="fas fa-plus"></i> เพิ่มหมวดหมู่ย่อย</a>

                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px" class="text-center">ลำดับ</th>
                                    <th class="text-center">ชื่อหมวดหมู่หลัก</th>
                                    <th class="text-center">ชื่อหมวดหมู่ย่อย</th>
                                    <th class="text-center">วันที่แก้ไขล่าสุด</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($sub->count() > 0)
                                    @foreach ($sub as $sub)
                                        @foreach ($sub->subcategory as $value)
                                            <tr>
                                                <td class="text-center">{{ $value->id }}</td>
                                                <td class="text-center">
                                                    @if ($sub->id === $value->category_id)
                                                        {{ $sub->name }}
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $value->subname }}</td>

                                                <td class="text-center">{{ DateThai($sub->updated_at) }}</td>
                                                <td class="text-center"><a href="{{ route('upDatesubcate', $value->id) }}"
                                                        class="btn btn-info"><i class="far fa-edit"></i> แก้ไข</a><a> </a>
                                                    <a href="{{ route('deleteSubcate', $value->id) }}"
                                                        class="btn btn-danger"><i class="far fa-trash-alt"></i> ลบ</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endforeach

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
