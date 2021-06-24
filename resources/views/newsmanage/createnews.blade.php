@extends('master')
@section('title', 'เพิ่มประกาศข่าว')
@section('content')
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h5> <i class="far fa-newspaper"></i> เพิ่มประกาศข่าว </h5>
                    <a href="/news/list" class="btn btn-info">กลับหน้ารายการ</a>
                </div>
                <!-- /.card-header -->
                <div class="container">
                    <div class="card-body">
                        <form action="/news/create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">หัวข่าว</label>
                                <input type="text" class="form-control" name="topic" placeholder="หัวข่าว" required
                                    value="{{ old('topic') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">รูปภาพหัวข่าว</label>
                                <div class="form-group">
                                    <div class="col-md-12 mb-2 text-center">
                                        <img id="preview-image-before-upload"
                                            src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                    <input type="file" name="image" placeholder="Choose image" id="image">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group" rows="20">
                                <label>เนื้อหา</label>
                                <textarea class="form-controll" name="description" placeholder="เนื้อข่าว" id="editor"
                                    require>{{ old('description') }} </textarea>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary ">บันทึก</button>
                                <button type="reset" class="btn btn-danger ">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

