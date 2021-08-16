@extends('master')
@section('title', 'แก้ไขไฟล์เอกสาร')
@section('content')
    <div class="container-fluid">

        <!-- /.container-header -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4> <i class="fas fa-building"></i> แก้ไขข้อมูลไฟล์เอกสาร </h4>
                    <a href="{{ url('/filedoc/list') }}" class="btn btn-info">กลับหน้ารายการ</a>
                </div>
                <!-- /.card-header -->
                <div class="container">
                    <div class="card-body">
                        <form action="/filedoc/upload" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อไฟล์</label>
                                    <input type="text" class="form-control" placeholder="ชื่อไฟล์" name="filename" required>
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
                                        id="sub_category" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customFile">รายละเอียดสถานประกอบการ</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="filepath">
                                        <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                                        @error('filepath')
                                        <div class="my-2">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
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
