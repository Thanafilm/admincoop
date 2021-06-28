@extends('master')
@section('title', 'แก้ไขแกลลอรี')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header border-0 pt-4">
                    <h5> <i class="nav-icon fas fa-edit"></i> แก้ไขแกลอรี </h5>
                    <a href="/gallery/list" class="btn btn-info"><i class="fas fa-list-ul"></i> กลับหน้ารายการ</a>

                </div>
                <!-- form start -->

                <div class="container">
                    <div class="card-body">

                        <div><br></div>
                        <div class="text-center">
                            <div class="container">
                                <div class="card border-0">
                                    <div class="card-header border-0">
                                        <h4 class="card-title">รูปภาพทั้งหมดในอัลบั้ม</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @if (count($gallery->image) > 0)
                                                @foreach ($gallery->image as $img)
                                                    <div class="col-sm-2">
                                                        <a href="{{ Storage::url('gallery/' . $img->image) }}"
                                                            data-toggle="lightbox"
                                                            data-title="{{ $gallery->galleryname }}"
                                                            data-gallery="gallery">
                                                            <img src="{{ Storage::url('gallery/' . $img->image) }}"
                                                                class="img-fluid mb-2" alt="white sample"
                                                                style="max-height:100px; " />
                                                        </a>
                                                        <span style="display: inline-block">
                                                            <form action="/image/delete/{{ $img->id }}" method="POST">
                                                                <button
                                                                    class="btn btn-danger btn-sm text-center delete-confirm">ลบรูปภาพ</button>
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="container" style="background : rgb(245, 235, 235)">
                                                    <h5>ไม่มีรูปภาพ</h5>
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('Gallery.Update', $gallery->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="text">ชื่ออัลบั้มรูปภาพ</label>
                            <input type="text" class="form-control" name="galleryname" placeholder="ชื่ออัลบั้ม"
                                required value="{{ $gallery->galleryname }}">
                        </div>
                        <div class="form-group">
                            <label for="customFile">อัปโหลรูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="customFile" name="images[]"
                                    multiple>
                                <label class="custom-file-label" for="customFile">เลือกรูปภาพ</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                        </div><br>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('.delete-confirm').on('click', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: '   ยืนยันการลบรูปภาพ ',
                icon: 'question',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF5530',
                cancelButtonColor: '#CFCDCC',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
