<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('ict_tran.png') }}">
    {{-- <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}"> --}}
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto&display=swap') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="{{ asset('template/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layout.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminICTCOOP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block"> {{ Auth::user()->name }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="/dashboard"
                                class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    หน้าหลัก
                                </p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) === 'coopdetail' ? 'menu-open' : null }} {{ Request::segment(1) === 'schedule' ? 'menu-open' : null }}
                  {{ Request::segment(1) === 'banner' ? 'menu-open' : null }} {{ Request::segment(1) === 'section' ? 'menu-open' : null }} ">
                            <a href="" class="nav-link {{ Request::segment(1) === 'coopdetail' ? 'active' : null }} {{ Request::segment(1) === 'schedule' ? 'active' : null }}
                    {{ Request::segment(1) === 'banner' ? 'active' : null }} {{ Request::segment(1) === 'section' ? 'active' : null }}">
                                <i class="nav-icon fas fa-window-restore"></i>
                                <p>
                                    จัดการหน้าเว็บไซต์
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/section"
                                        class="nav-link {{ Request::segment(1) === 'section' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>แก่ไขลำดับ section</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/banner"
                                        class="nav-link {{ Request::segment(1) === 'banner' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>แก้ไขสไลด์แเบนเนอร์</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/coopdetail"
                                        class="nav-link {{ Request::segment(1) === 'coopdetail' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>แก้ไขข้อมูลสหกิจ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/schedule/coop"
                                        class="nav-link {{ Request::segment(2) === 'coop' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>แก้ไขกำหนดการสหกิจ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/schedule/edu"
                                        class="nav-link {{ Request::segment(2) === 'edu' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>แก้ไขกำหนดการฝึกงาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Request::segment(1) === 'category' ? 'menu-open' : null }} {{ Request::segment(1) === 'subcate' ? 'menu-open' : null }}">
                            <a href=""
                                class="nav-link {{ Request::segment(1) === 'category' ? 'active' : null }} {{ Request::segment(1) === 'subcate' ? 'active' : null }}">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>
                                    จัดการหมวดหมู่เอกสาร
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/category/list"
                                        class="nav-link {{ Request::segment(1) === 'category' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการหมวดหมู่หลัก</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/subcate/list"
                                        class="nav-link {{ Request::segment(1) === 'subcate' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการหมวดหมู่ย่อย</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/news/list"
                                class="{{ Request::segment(1) === 'news' ? 'active' : null }} nav-link ">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    รายการข่าวประชาสัมพันธ์
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/gallery/list"
                                class="nav-link {{ Request::segment(1) === 'gallery' ? 'active' : null }}">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    รายการแกลอรี
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/filedoc/list"
                                class="nav-link {{ Request::segment(1) === 'filedoc' ? 'active' : null }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    รายการไฟล์เอกสาร
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/company/list"
                                class="nav-link {{ Request::segment(1) === 'company' ? 'active' : null }}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    รายการสถานประกอบการ
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">ผู้ใช้</li>
                        @role('admin')
                        <li class="nav-item">
                            <a href="/user/list"
                                class="nav-link {{ Request::segment(1) === 'user' ? 'active' : null }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    จัดการผู้ใช้งาน
                                </p>
                            </a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i
                                    class="nav-icon fas fa-sign-out-alt"></i>
                                <p> ออกจากระบบ </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mb-3">
                </div>
            </div>
            @yield('content')

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layout.footer')


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    @include('sweetalert::alert')
    <script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('ck.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height: 600
        });
    </script>


    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder).height(100);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
        $('input[type="checkbox"]').on('change', function() {
            if ($('input[type="checkbox"]').eq(7).is(':checked')) {
                $('input[type="checkbox"]').not($(this)).attr('disabled', true);
            } else {
                $('input[type="checkbox"]').not($(this)).attr('disabled', false);
            }
        });
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "language": {
                    "emptyTable": "ไม่มีข้อมูล",
                    "info": "แสดง _PAGE_ ถึง _PAGES_ จากทั้งหมด _TOTAL_  ",
                    "infoEmpty": "แสดง 0 ถึง 0 จาก ทั้งหมด 0"
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({

                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "emptyTable": "ไม่มีข้อมูล",
                    "info": "แสดง _PAGE_ ถึง _PAGES_ จากทั้งหมด _TOTAL_  ",
                    "infoEmpty": "แสดง 0 ถึง 0 จาก ทั้งหมด 0"

                },

            });
        });
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
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
                title: '   ยืนยันการลบข้อมูล ',
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
        $(document).ready(function() {

            function updateToDatabase(idString) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: '{{ url('/menu/update-order') }}',
                    method: 'POST',
                    data: {
                        ids: idString
                    },
                    success: function() {
                        alert('Successfully updated')
                        //do whatever after success
                    }
                })
            }

            var target = $('.sort_menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function(e, ui) {
                    var sortData = target.sortable('toArray', {
                        attribute: 'data-id'
                    })
                    updateToDatabase(sortData.join(','))
                }
            })

        })
    </script>
    <script src="{{ 'template/plugins/chart.js/Chart.min.js' }}"></script>
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('template/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/demo.js') }}"></script>
    <script src="{{ asset('template/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <script src="{{ asset('template/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"> </script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/js/lightgallery.js"></script>
    <!-- jQuery -->

    <!-- Bootstrap 4 -->

    <!-- ChartJS -->

    {{-- ck --}}

</body>

</html>
