@extends('master')
@section('title', 'อัปรูป')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header border-0 pt-3">
                    <h5> <i class="nav-icon fas fa-edit"></i> อัปโหลดแกลอรี </h5>
                    <a href="/gallery/list" class="btn btn-info">กลับหน้ารายการ</a>

                </div><br>
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
                        <div class="text-center">
                            <img src="{{ Storage::url('cover/' . $gallery->coverimg) }}" class="img-responsive"
                                style="max-height:600px; max-width: 600px;" alt="" srcset=""><br>
                            <form action="/cover/delete/{{ $gallery->id }}" method="POST">
                                <button class="btn text-danger">ลบภาพหน้าปก</button>
                                @csrf
                                @method('delete')
                            </form>

                            @if (count($gallery->image) > 0)
                                <h4 class="text-left">รูปภาพทั้งหมด:</h4>
                                @foreach ($gallery->image as $img)

                                    <span style="display: inline-block">
                                        <form action="/image/delete/{{ $img->id }}" method="POST">
                                            <img src="{{ Storage::url('gallery/' . $img->image) }}" class="img-responsive"
                                                style="max-height: 165px; max-width: 300px;" alt="" srcset=""><br>
                                            <button class="btn text-danger text-center">ลบรูปภาพ</button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </span>


                                @endforeach
                            @endif
                        </div>

                        <form action="{{ route('Gallery.Update', $gallery->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="text">ชื่ออัลบั้มรูป</label>
                                <input type="text" class="form-control" name="galleryname" placeholder="ชื่ออัลบั้ม"
                                    required value="{{ $gallery->galleryname }}">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="coverimg" placeholder="Choose image">
                            </div>
                            <div><br></div>
                            <div class="custom-file">
                                <input type="file" name="images[]" placeholder="Choose image" multiple>
                            </div>
                            <div><br></div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">อัปโหลด</button>
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                            </div><br>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
