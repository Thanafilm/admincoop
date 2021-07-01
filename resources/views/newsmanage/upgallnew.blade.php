@extends('master')
@section('title', 'อัปรูป')
@section('content')
    <div class="container-fluid">

        <div class="col-md-6 offset-md-3">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title text-center "> <i class="nav-icon fas fa-edit"></i> อัปโหลดแกลอรี </h3>
                </div>
                <!-- form start -->
                <div class="container-fluid">
                    <div class="card-body">
                        <form action="{{ route('Gallery.Create.News', $new->id) }}" method="POST"
                            enctype="multipart/form-data">
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
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">อัปโหลด</button>
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                            @method('post')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
