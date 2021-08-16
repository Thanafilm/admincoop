@extends('master')
@section('title', 'แก้ไขไฟล์เอกสาร')
@section('content')
    <div class="container-fluid">
        <!-- /.container-header -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h3> <i class="fas fa-building"></i> แก้ไขข้อมูลไฟล์เอกสาร </h3>
                    <a href="{{ url('/filedoc/list') }}" class="btn btn-info">กลับหน้ารายการ</a>
                </div>
                <!-- /.card-header -->

                <div class="container">
                    <div class="card-body">
                        <form action="{{ route('File.Update', $file->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อไฟล์</label>
                                    <input type="text" class="form-control" placeholder="ชื่อไฟล์" name="filename"
                                        value="{{ $file->filename }}">
                                </div>
                                <div class="form-group">
                                    <label>หมวดหมู่</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id"
                                        id="sub_category_name" required>
                                        <option value="" disabled selected>เลือกหมวดหมู่</option>
                                        @if ($categorys->count() > 0)
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @if (count($category->subcategory) > 0)
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>หมวดหมู่</label>
                                    <select class="form-control select2" style="width: 100%;" name="subcate_id"
                                        id="sub_category">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">ไฟล์</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" autocomplete="off" name="filepath">
                                    </div>
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
                                <!-- /.card-body -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <label>ตัวอย่างไฟล์</label>
                        @if (pathinfo($file->filepath, PATHINFO_EXTENSION) == 'docx')
                            <div class="small-box bg-white shadow col-md-6">
                                <div class="inner py-3">
                                    <a href="{{ Storage::url('filedoc/' . $file->filepath) }}">
                                        <p style="font-size: 200%;margin-left:50px"><i class="fas fa-file-download"></i>
                                            {{ $file->filename }}
                                        </p>
                                        <div class="icon" style="font-size: 100%;">
                                            <i class="fas fa-file-word"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else

                                <iframe src="{{ Storage::url('filedoc/' . $file->filepath) }}"
                                    style="width:100%;min-height:700px;postion:absolute" frameborder="0">

                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $(document).ready(function() {
        $('#sub_category_name').on('change', function() {
            let id = $(this).val();
            $('#sub_category').empty();
            $('#sub_category').append(`<option value="0" disabled selected>รอสักครู่</option>`);
            $.ajax({
                type: 'GET',
                url: '/getsubcategory/' + id,
                success: function(response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#sub_category').empty();
                    $('#sub_category').append(
                        `<option value="0" disabled selected>ประเภทเอกสาร</option>`
                    );
                    response.forEach(element => {
                        $('#sub_category').append(
                            (
                                `<option value="${element['id']}">${element['subname']}</option>`
                            )
                        );
                    });
                }
            });
        });
    });
</script>
