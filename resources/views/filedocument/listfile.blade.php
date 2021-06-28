@extends('master')
@section('title', 'รายการหมวดหมู่')
@section('content')
    <div class="container-fluid">

        </section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4> <i class="fas fa-newspaper"></i> รายการไฟล์เอกสาร
                    </h4><a href="/filedoc/upload" class="btn btn-primary">
                        <i class="fas fa-file-upload"></i> อัปโหลดไฟล์เอกสาร</a>
                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 200px">ชื่อไฟล์</th>
                                    <th style="width: 200px" class="text-center">หมวดหมู่</th>
                                    <th style="width: 200px" class="text-center">หมวดหมู่ย่อย</th>
                                    <th style="width: 200px" class="text-center">วันที่แก้ไขล่าสุด</th>
                                    <th style="width: 200px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($filedoc->count() > 0)
                                    @foreach ($filedoc as $file)


                                            <tr>
                                                <td>{{ $file->filename }}</td>

                                                <td class="text-center">{{ $file->name }}</td>
                                                <td class="text-center">{{ $file->subname }}</td>

                                                <td class="text-center">{{ $file->updated_at }}</td>
                                                <td class="text-center"><a
                                                        href="{{ route('File.Update.Form', $file->id) }}"
                                                        class="btn btn-info"><i class="far fa-edit"></i> แก้ไข</a><a>
                                                    </a>
                                                    <a href="{{ route('file.Delete', $file->id) }}"
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
    </div>
@endsection
