@extends('master')
@section('title', 'จัดการแบนเนอร์')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title text-center "> <i class="fab fa-adversal"></i> จัดการแบนเนอร์
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-lg">อัปโหลดแบนเนอร์</button>
                    </h3>
                </div>
                <!-- form start -->
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">อัปโหลดแบนเนอร์</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('Banner.Post') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="customFile">อัปโหลดรูปภาพ</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>ลิงค์ประกอบแบนเนอร์</label>
                                        <input type="text" class="form-control" name="path"
                                            placeholder="ลิงค์ประกอบแบนเนอร์">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">อัปโหลด</button>
                                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px" class="text-center">ลำดับ</th>
                                    <th class="text-center">รูปภาพ</th>
                                    <th style="width: 150px" class="text-center">ลิงค์ประกอบ</th>
                                    <th style="width: 150px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($ban->count() > 0)
                                    @foreach ($ban as $img)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">
                                                <img src="{{ Storage::url('banner/' . $img->image) }}"
                                                    class="img-responsive" style="max-height: 165px; max-width: 300px;">
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                @if ($img->path != null)
                                                    <a href="{{ 'https://'.$img->path }}" target="_blank" class="btn btn-success"><i
                                                            class="fas fa-link"></i> คลิกลิงค์</a>
                                                @else
                                                    <a>ไม่มีลิงค์แนบประกอบ</a>
                                                @endif
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <span style="display: inline-block" class="text-center">
                                                    <form action="/banner/delete/{{ $img->id }}" method="POST">
                                                        <button class="btn btn-danger text-center"><i
                                                                class="far fa-trash-alt"></i> ลบแบนเนอร์</button>
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
