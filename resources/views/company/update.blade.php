@extends('master')
@section('title', 'แก้ไขข้อมูลสถานประกอบการ')
@section('content')
    <div class="container-fluid">
        <!-- /.container-header -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h4> <i class="fas fa-building"></i> แก้ไขข้อมูลสถานประกอบการ</h4>
                    <a href="/company/list" class="btn btn-info">กลับหน้ารายการ</a>
                </div>
                <!-- /.card-header -->
                <div class="container">
                    <div class="card-body">
                        <form action="{{ route('Company.Edit', $coms->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text">หัวข่าว</label>
                                <input type="text" class="form-control" name="corpname" placeholder="ชื่อบริษัท"
                                    value="{{ $coms->corpname }}"><br>
                                <div class="form-group">
                                    <label><strong>สาขาที่รองรับ :</strong></label><br>
                                    <label><input name="suppbranch[]" value="CPE" type="checkbox" @if (in_array('CPE', $br)) checked @endif>
                                        CPE</label>
                                    <label><input name="suppbranch[]" value="BC" type="checkbox" @if (in_array('BC', $br)) checked @endif>
                                        BC</label>
                                    <label><input name="suppbranch[]" value="IT" type="checkbox" @if (in_array('IT', $br)) checked @endif>
                                        IT</label>
                                    <label><input name="suppbranch[]" value="GIS" type="checkbox" @if (in_array('GIS', $br)) checked @endif>
                                        GIS</label>
                                    <label><input name="suppbranch[]" value="CG" type="checkbox" @if (in_array('CG', $br)) checked @endif>
                                        BC</label>
                                    <label><input name="suppbranch[]" value="SE" type="checkbox" @if (in_array('SE', $br)) checked @endif>
                                        IT</label>
                                    <label><input name="suppbranch[]" value="CS" type="checkbox" @if (in_array('CS', $br)) checked @endif>
                                        CS</label>
                                    <label><input name="suppbranch[]" value="ทุกสาขา" type="checkbox" @if (in_array('ทุกสาขา', $br)) checked @endif>ทุกสาขา</label>
                                </div>
                                <input type="text" class="form-control" name="address" placeholder="ที่ตั้งบริษัท"
                                    value="{{ $coms->address }}" required><br>

                            </div>
                            <div class="form-group">
                                {!! Form::selectYear('year', 2563, 2580, $coms->year, ['class' => 'form-control']) !!}
                            </div><br>
                            <label>อัปโหลดไฟล์ข้อมูลรายละเอียดสถานประกอบการ</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="corpdetail">
                                <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
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
