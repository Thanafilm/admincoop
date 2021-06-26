@extends('master')
@section('title', 'อัปรูป')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header border-0 pt-4">
                    <h5> <i class="nav-icon fas fa-edit"></i> อัปโหลดแกลอรี </h5>
                    <a href="/gallery/list" class="btn btn-info">กลับหน้ารายการ</a>

                </div><br>
                <!-- form start -->

                <div class="container">
                    <div class="card-body">
                        <form action="{{ route('Gallery.Update', $gallery->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row ">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="text">ชื่ออัลบั้มรูป</label>
                                        <input type="text" class="form-control" name="galleryname" placeholder="ชื่ออัลบั้ม"
                                            required value="{{ $gallery->galleryname }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="custom-file">
                                        <input type="file" name="coverimg" placeholder="Choose image">
                                    </div>
                                </div>

                                {{-- <div><br></div> --}}
                                <div class="col-4">
                                    <div class="custom-file">
                                        <input type="file" name="images[]" placeholder="Choose image" multiple>
                                    </div>
                                </div>

                                {{-- <div><br></div> --}}


                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </form>
                        <div><br></div>
                        <div class="text-center">
                            <div class="container">
                                <div class="card border-0">
                                    <div class="card-header border-0">
                                        <h4 class="card-title">รูปภาพประจำอัลบั้ม</h4>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{ Storage::url('cover/' . $gallery->coverimg) }}"
                                            class="img-responsive" style="max-height:600px; max-width: 350px;">
                                    </div>

                                </div>

                                <div><br></div>
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
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        })
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
