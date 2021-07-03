@extends('master')
@section('title', 'จัดการ section')
@section('content')
<div class="container-fluid">
    <!-- /.container-header -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-3">
                <h4> <i class="fas fa-sort"></i> แก้ไขลำดับ Section </h4>
            </div>
            <!-- /.card-header -->
            <div class="container">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="container">
                                <ul class="sort_menu list-group">
                                    @foreach ($data as $row)
                                    {{-- <li class="list-group-item center" data-id="{{$row->id}}">
                                        <span class="fas fa-align-justify"></span> Section {{$row->title}}</li> --}}
                                        <div class="small-box bg-white shadow" data-id="{{$row->id}}">
                                            <div class="inner py-3 handle">
                                               <p style="font-size: 250%;margin-left:50px">{{ $loop->index+1  }} {{$row->title}} </p>

                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-sort"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                    <style>
                        .list-group-item {
                            display: flex;
                            align-items: center;
                        }

                        .highlight {
                            background: #f7e7d3;
                            min-height: 30px;
                            list-style-type: none;
                        }

                        .handle {
                            min-width: 100%;
                            /* background: #607D8B; */
                            height: 100%;
                            display: inline-block;
                            cursor: move;
                            margin-right: 100%;
                        }
                    </style>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
