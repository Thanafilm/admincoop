@extends('master')
@section('title', 'อัปรูป')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header border-0 pt-3">
                    <h4> <i class="nav-icon fas fa-images"></i> อัปโหลดแกลอรี </h4>
                    <a href="/gallery/list" class="btn btn-info"><i class="fas fa-list-ul"></i> กลับหน้ารายการ</a>
                </div>
                <!-- form start -->
                <div class="container">
                    <div class="card-body">

                        <form action="/gallery/create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="text">ชื่ออัลบั้มรูป</label>
                                <input type="text" class="form-control" name="galleryname" placeholder="ชื่ออัลบั้ม"
                                    required value="{{ old('galleryname') }}">
                            </div>
                            <div class="form-group">
                                <label for="customFile">รูปภาพ</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="customFile" name="images[]" multiple>
                                    <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">อัปโหลด</button>
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
