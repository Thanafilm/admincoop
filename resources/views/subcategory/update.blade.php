@extends('master')
@section('title', 'เพิ่มหมวดหมู่ย่อย')
@section('content')
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title text-center "> <i class="nav-icon fas fa-edit"></i> เพิ่มหมวดหมู่ย่อย </h3>
                </div>
                <!-- form start -->
                <div class="container">
                    <form action="{{ route('upDatesubcate', $sub->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label>หมวดหมู่</label>
                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    <option value="{{ $sub->category_id }}" selected>{{ $sub->category->name }}</option>
                                    @if ($categorys->count() > 0)
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="text">ชื่อหมวดหมู่</label>
                                <input type="text" class="form-control" name="name" placeholder="หัวข้อข่าว" required
                                    value="{{ $sub->name }}">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
