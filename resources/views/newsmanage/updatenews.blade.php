@extends('master')
@section('title', 'แก้ไขประกาศข่าว')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4> <i class="far fa-newspaper"></i> แก้ไขประกาศข่าว </h4>
                    <a href="{{ url('/news/list') }}" class="btn btn-info"><i class="fas fa-list-ul"></i> กลับหน้ารายการ</a>
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
                            <label for="customFile">รูปพาดหัวข่าว</label>
                            <img src="{{ Storage::url('image/' . $news->image) }}" class="rounded mx-auto d-block"
                                style="max-width:400px;max-height: 300px" ><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                                @error('filepath')
                                    <div class="my-2">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">เนื้อหา</label>
                            <textarea class="form-controll" name="description" placeholder="เนื้อข่าว"
                                id="editor">{{ $news->description }}</textarea>
                        </div>
                        <div class=" text-center">
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
