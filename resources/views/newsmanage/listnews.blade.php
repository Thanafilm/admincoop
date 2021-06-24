@extends('master')
@section('title', 'รายการข่าว')
@section('content')
    <div class="container-fluid">
        <!-- /.container-header -->
        <div class="container-fluid">
            <div class="row mb-3">
            </div>
        </div>
        <!-- /.container-header -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="far fa-newspaper"></i> รายการข่าวทั้งหมด <a href="/news/create" class="btn btn-primary ">
                            <i class="fas fa-plus"></i> เพิ่มรายการข่าว</a></h4>

                </div>
                <!-- /.card-header -->
                <div class="container-fluid">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px" class="text-center">ลำดับ</th>
                                    <th class="text-center">หัวข้อข่าว</th>
                                    <th style="width: 200px" class="text-center">จำนวนการเข้าชม</th>
                                    <th style="width: 200px" class="text-center">วันที่ประกาศ</th>
                                    <th style="width: 200px" class="text-center">'วันที่แก้ไขล่าสุด</th>
                                    <th style="width: 200px" class="text-center">จัดการแกลอรีข่าว</th>
                                    <th style="width: 200px" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($news->count() > 0)
                                    @foreach ($news as $new)
                                        <tr>
                                            <td class="text-center"> {{ $loop->index + 1 }} </td>
                                            <td>{{ $new->topic }}</td>
                                            <td class="text-center">{{ $new->view }}</td>
                                            <td>{{ $new->created_at }}</td>
                                            <td>{{ $new->updated_at }}</td>
                                            <td class="text-center">
                                                @if ($new->gallery != null)
                                                    <a href="{{ route('Gallery.Update', $new->gallery->id) }}"
                                                        class="btn btn-success">
                                                        <i class="far fa-images"></i> แก้ไขอัลบั้ม</a>
                                                @endif
                                                @if ($new->gallery == null)
                                                    <form action="{{ route('Gallery.Create.News.Form', $new->id) }}"
                                                        method="post">
                                                        <button class="btn btn-success" type="submit">
                                                            <i class="far fa-images"></i> เพิ่มอัลบั้ม</button>
                                                        @csrf
                                                        @method('post')
                                                    </form>
                                                @endif

                                            </td>
                                            <td><a href="{{ route('news.Update.Form', $new->id) }}"
                                                    class="btn btn-info"><i class="far fa-edit"></i> แก้ไข</a><a> </a>
                                                <a href="{{ route('news.Delete', $new->id) }}" class="btn btn-danger"><i
                                                        class="far fa-trash-alt"></i> ลบ</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="5">
                                        <div class="text-center">ไม่มีข้อมูล</div>
                                    </td>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
