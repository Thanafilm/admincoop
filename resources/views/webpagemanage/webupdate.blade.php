@extends('master')
@section('title', 'แก้ไขหน้าข้อมูลเว็บเพจ')
@section('content')
    <div class="container-fluid">
        <!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-3">
                    <h5> <i class="fas fa-info-circle"></i> แก้ไขข้อมูลกำหนดการฝึกงาน </h5>
                </div>
                <!-- /.card-header -->
                <div class="container">
                    <div class="card-body">
                        @if ($webpage != null)
                            <form action="{{ route('home.setting') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="form-controll" name="detail" placeholder="เนื้อข่าว"
                                        id="editor">{{ $webpage->detail }}</textarea>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('home.setting') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="form-controll" name="detail" placeholder="เนื้อข่าว"
                                        id="editor"></textarea>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
