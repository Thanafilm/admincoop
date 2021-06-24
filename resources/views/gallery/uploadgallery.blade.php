@extends('master')
@section('title', 'อัปรูป')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header border-0 pt-3">
                    <h4> <i class="nav-icon fas fa-images"></i> อัปโหลดแกลอรี </h4>
                    <a href="/gallery/list" class="btn btn-info">กลับหน้ารายการ</a>
                </div>
                <!-- form start -->
                <div class="container">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/gallery/create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="text">ชื่ออัลบั้มรูป</label>
                                <input type="text" class="form-control" name="galleryname" placeholder="ชื่ออัลบั้ม"
                                    required value="{{ old('galleryname') }}">
                            </div>
                            <label>รูปภาพประจำอัลบั้ม</label>
                            <div class="custom-file">

                                <input type="file" name="coverimg" placeholder="เลือกรูปภาพ">
                            </div>
                            <div><br></div>
                            <label>รูปภาพ</label>
                            <div class="custom-file">

                                <input type="file" name="images[]" placeholder="เลือกรูปภาพ" multiple>
                            </div>
                            <div><br></div>

                            <div class="card-footer text-center">
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
