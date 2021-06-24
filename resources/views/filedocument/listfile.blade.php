@extends('master')
@section('title', 'รายการหมวดหมู่')
@section('content')
    <div class="container-fluid">

        </section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4 > <i class="fas fa-newspaper"></i> รายการไฟล์เอกสาร
                        <a href="/filedoc/upload" class="btn btn-primary">
                            <i class="fas fa-file-upload"></i> อัปโหลดไฟล์เอกสาร</a></h4>
                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    {{-- <th style="width: 10px" class="text-center">ลำดับ</th> --}}
                                    <th class="text-center" style="width: 200px">ชื่อไฟล์</th>
                                    <th style="width: 200px" class="text-center">หมวดหมู่</th>
                                    <th style="width: 200px" class="text-center">วันที่แก้ไขล่าสุด</th>
                                    <th style="width: 200px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($filedoc->count() > 0)
                                    @foreach ($filedoc as $filedoc)
                                        <tr>
                                            <td>{{ $filedoc->filename }}</td>

                                            <td class="text-center">
                                                @if ($filedoc->category_id = 1)
                                                    <a>สหกิจ</a>
                                                @else
                                                    <a>ฝึกงาน</a>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $filedoc->updated_at }}</td>
                                            <td class="text-center"><a
                                                    href="{{ route('File.Update.Form', $filedoc->id) }}"
                                                    class="btn btn-info"><i class="far fa-edit"></i> แก้ไข</a><a> </a>
                                                <a href="{{ route('file.Delete', $filedoc->id) }}"
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
