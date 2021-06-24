@extends('master')
@section('title', 'จัดการแบนเนอร์')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title text-center "> <i class="nav-icon fas fa-edit"></i> อัปโหลดแบนเนอร์ </h3>
            </div>
            <!-- form start -->
            <div class="container">
                <div class="card-body">
                    <form action="{{ route('Banner.Post') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label>อัปโหล</label>
                        <div class="custom-file">
                            <input type="file" name="image" placeholder="เลือกรูปภาพ" multiple>
                        </div>
                        <div class="form-controll">
                            <input type="text" name="path" placeholder="กรอกลิงค์ข้อมูลเพิ่มเติม" multiple>
                        </div>
                        <button type="submit">บันทึก</button>
                    </form>

                    <h4 class="text-left">รูปภาพทั้งหมด:</h4>
                    @foreach ($ban as $img)
                        <span style="display: inline-block" class="text-center">
                            <form action="/banner/delete/{{ $img->id }}" method="POST">
                                <img src="{{ Storage::url('banner/' . $img->image) }}" class="img-responsive"
                                    style="max-height: 165px; max-width: 300px;" alt="" srcset=""><br>
                                <button class="btn text-danger text-center">ลบรูปภาพ</button>
                                @csrf
                                @method('delete')
                            </form>
                        </span>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
