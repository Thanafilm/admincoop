@extends('master')
@section('title', 'รายการแกลอรี')
@section('content')
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center "> <i class="far fa-newspaper"></i> รายการแกลอรี
                        <a href="/gallery/create" class="btn btn-primary ">
                            <i class="fas fa-upload"></i> อัปโหลดแกลอรี</a>
                    </h3><br>
                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    {{-- <th style="width: 10px" class="text-center">ลำดับ</th> --}}
                                    <th class="text-center" style="width: 200px">ชื่อแกลอรี</th>
                                    {{-- <th class="text-center" style="width: 200px">หัวข้อประจำเแกลรี</th> --}}
                                    <th style="width: 200px" class="text-center">วันที่อัปโหลด</th>
                                    <th style="width: 200px" class="text-center">วันที่แก้ไขล่าสุด</th>
                                    <th style="width: 200px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($gall->count() > 0)
                                    @foreach ($gall as $album)
                                        <tr>
                                            <td class="text-center">{{ $album->galleryname }}</td>
                                            <td class="text-center"> <img
                                                    src="{{ Storage::url('cover/' . $album->coverimg) }}"
                                                    class="rounded mx-auto d-block" style="width:200px" /></td>
                                            <td class="text-center">{{ $album->updated_at }}</td>
                                            <td class="text-center">

                                                <form action="/gallery/delete/{{ $album->id }}" method="post">
                                                    <a href="{{ route('Gallery.Update', $album->id) }} "
                                                        class="btn btn-info">
                                                        <i class="far fa-edit"></i> แก้ไข </a>
                                                    <button class="btn btn-danger" type="submit"> <i
                                                            class="far fa-trash-alt"></i> ลบ</button>
                                                    @csrf
                                                    @method('delete')
                                                </form>


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
