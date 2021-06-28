@extends('master')
@section('title', 'รายการข่าว')
@section('content')
    <!-- /.container-header -->
    <div class="container-fluid">
        <!-- /.container-header -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4> <i class="fas fa-building"></i> เพิ่มสถานประกอบการ </h4>
                    <a href="/company/list" class="btn btn-info"><i class="fas fa-list-ul"></i> กลับหน้ารายการ</a>
                </div>
                <!-- /.card-header -->
                <div class="container">
                    <div class="card-body">
                        <form action="{{ route('createcorp') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group supp">
                                <label for="text">ชื่อสถานประกอบการ</label>
                                <input type="text" class="form-control" name="corpname" placeholder="ชื่อสถานประกอบการ"
                                    value="{{ old('corpname') }}" required><br>
                                <div id="clickevent" class="form-group">
                                    <label><strong>สาขาที่รองรับ :</strong></label><br>
                                    <label><input type="checkbox" name="suppbranch[]" value="CPE"> CPE</label>
                                    <label><input type="checkbox" name="suppbranch[]" value="BC"> BC </label>
                                    <label><input type="checkbox" name="suppbranch[]" value="IT"> IT </label>
                                    <label><input type="checkbox" name="suppbranch[]" value="GIS"> GIS</label>
                                    <label><input type="checkbox" name="suppbranch[]" value="CG"> CG </label>
                                    <label><input type="checkbox" name="suppbranch[]" value="SE"> SE </label>
                                    <label><input type="checkbox" name="suppbranch[]" value="CS"> CS </label>
                                    <label><input type="checkbox" name="suppbranch[]" value="ทุกสาขา">
                                        ทุกสาขา</label>
                                    @error('suppbranch')
                                        <div class="my-2">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group">
                                <label>ที่ตั้งสถานประกอบการ</label>
                                <input type="text" class="form-control" name="address" placeholder="ที่ตั้งบริษัท"
                                    value="{{ old('address') }}" required><br>
                            </div>
                            <div class="form-group">
                                <label>ปีการศึกษา</label>
                                {!! Form::selectYear('year', 2564, 2570, '', ['class' => 'form-control']) !!}
                            </div><br>

                            <div class="form-group">
                                <label for="customFile">รายละเอียดสถานประกอบการ</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="corpdetail">
                                    <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary " id="checkBtn">บันทึก</button>
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
<script>
    $(document).ready(function() {
        $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;
            if (!checked) {
                // alert("กรุณาเลือกสาขาที่รองรับ");
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })

                return false;
            }

        });
    });
</script>
