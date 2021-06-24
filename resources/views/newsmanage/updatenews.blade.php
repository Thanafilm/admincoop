@extends('master')
@section('title', 'แก้ไขประกาศข่าว')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-3">
                <h5> <i class="far fa-newspaper"></i> แก้ไขประกาศข่าว </h5>
                <a href="/news/list" class="btn btn-info">กลับหน้ารายการ</a>
            </div>
            <!-- /.card-header -->
            <div class="container">
                <form action="{{ route('news.Update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="text">หัวข่าว</label>
                        <input type="text" class="form-control" name="topic" placeholder="หัวข่าว"
                            value={{ $news->topic }}>
                    </div>
                    <div class="form-group">
                        <img src="{{ Storage::url('image/' . $news->image) }}" class="rounded mx-auto d-block"
                            style="width:400px"><br>
                        <label for="exampleInputFile">รูปภาพหัวข่าว</label>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">เนื้อหา</label>
                        <textarea class="form-controll" name="description" placeholder="เนื้อข่าว"
                            id="editor">{{ $news->description }}</textarea>
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
@endsection
