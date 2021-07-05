@extends('master')
@section('title', 'ประวัติการดำเนินการ')
@section('content')
    <div class="container-fluid">
        <!-- /.container-header -->
        <div class="col-12">
            <div class="card">
                <div class="card-header pt-3 border-0">
                    <h4><i class="far fa-newspaper"></i> รายการประวัติการดำเนินการ</h4>
                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">กิจกรรม</th>
                                    <th class="text-center">ผู้ดำเนินการ</th>
                                    <th class="text-center">ส่วนที่จัดการ</th>
                                    <th class="text-center">วันที่ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($activities->count() > 0)
                                    @foreach ($activities as $new)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">
                                                @if($new->description == 'created')
                                                <label class="badge badge-success">{{ $new->description }}</label>
                                                @elseif($new->description =='deleted')
                                                <label class="badge badge-danger">{{ $new->description }}</label>
                                                @elseif($new->description =='updated')
                                                <label class="badge badge-primary">{{ $new->description }}</label>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $new->name }}</td>
                                            <td class="text-center">
                                                @if ($new->subject_type == 'App\Models\News')
                                                    ข่าวประชาสัมพันธ์
                                                @elseif($new->subject_type == 'App\Models\Gallery')
                                                    แกลอรี
                                                @elseif($new->subject_type == 'App\Models\User')
                                                    ผู้ใช้
                                                @elseif($new->subject_type == 'App\Models\Company')
                                                    สถานประกอบการ
                                                @elseif($new->subject_type == 'App\Models\Image')
                                                    รูปภาพ
                                                @elseif($new->subject_type == 'App\Models\Edusche')
                                                    กำหนดการสหกิจ
                                                @elseif($new->subject_type == 'App\Models\Section')
                                                    ลำดับ Section
                                                @elseif($new->subject_type == 'App\Models\Filedoc')
                                                    เอกสาร
                                                @elseif($new->subject_type == 'App\Models\Banner')
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $new->created_at }}</td>
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
