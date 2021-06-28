@extends('master')
@section('title', 'รายการแกลอรี')
@section('content')
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4 > <i class="far fa-newspaper"></i> รายการแกลอรี</h4>
                        <a href="/gallery/create" class="btn btn-primary ">
                            <i class="fas fa-upload"></i> อัปโหลดแกลอรี</a>

                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px" class="text-center">ลำดับ</th>
                                    <th class="text-center" style="width: 200px">ชื่อแกลอรี</th>
                                    <th style="width: 200px" class="text-center">วันที่อัปโหลด</th>
                                    <th style="width: 200px" class="text-center">วันที่แก้ไขล่าสุด</th>
                                    <th style="width: 200px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($gall->count() > 0)
                                    @foreach ($gall as $album)
                                        <tr>
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td class="text-center">{{ $album->galleryname }}</td>
                                            <td class="text-center">{{ Datethai($album->created_at) }}</td>
                                            <td class="text-center">{{ Datethai($album->updated_at) }}</td>
                                            <td class="text-center">
                                                <form action="/gallery/delete/{{ $album->id }}" method="POST">
                                                    <a href="{{ route('Gallery.Update', $album->id) }} "
                                                        class="btn btn-info">
                                                        <i class="far fa-edit"></i> แก้ไข </a>
                                                    <button class="btn btn-danger delete-confirm" type="submit"> <i
                                                            class="far fa-trash-alt"></i> ลบ</button>
                                                    @csrf
                                                    @method('delete')
                                                </form>


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
