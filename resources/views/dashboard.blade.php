@extends('master')
@section('title', 'แดชบอร์ด')
@section('content')


        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info shadow">
                        <div class="text-center inner">
                            <h1 class="py-3">&nbsp;รายการข่าว&nbsp;</h1>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/news/list" class="small-box-footer py-3">จัดการ <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>

                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary shadow">
                        <div class="text-center inner">
                            <h1 class="py-3">&nbsp;ไฟล์เอกสาร&nbsp;</h1>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/filedoc/list" class="small-box-footer py-3">จัดการ <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success shadow">
                        <div class="text-center inner">
                            <h1 class="py-3">&nbsp;สถานประกอบการ&nbsp;</h1>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/company/list" class="small-box-footer py-3">จัดการ <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="text-center inner">
                            <h1 class="py-3">&nbsp;รายการแกลลอรี&nbsp;</h1>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/gallery/list" class="small-box-footer py-3">จัดการ<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-white shadow">
                        <div class="inner py-3">
                            <h3>{{ $news->count() }}</h3>
                            <p>ข่าวทั้งหมด</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-white shadow">
                        <div class="inner py-3">
                            <h3>{{ $file->count() }}</h3>
                            <p>เอกสารทั้งหมด</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-word"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-white shadow">
                        <div class="inner py-3">
                            <h3>{{ $company->count() }}</h3>
                            <p>ยอดสถานประกอบการ</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-white shadow">
                        <div class="inner py-3">
                            <h3>{{ $gallery->count() }}</h3>
                            <p>จำนวนแกลอรี</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-image"></i>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Bar Chart</h3>

                            <div class="card-tools">


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>



@endsection
