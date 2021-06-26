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
                <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            หน้าหลัก
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::segment(1) === 'coopdetail' ? 'menu-open' : null }} {{ Request::segment(1) === 'schedule' ? 'menu-open' : null }}
          {{ Request::segment(1) === 'banner' ? 'menu-open' : null }} ">
                    <a href="" class="nav-link {{ Request::segment(1) === 'coopdetail' ? 'active' : null }} {{ Request::segment(1) === 'schedule' ? 'active' : null }}
            {{ Request::segment(1) === 'banner' ? 'active' : null }}">
                        <i class="nav-icon fas fa-window-restore"></i>
                        <p>
                            จัดการหน้าเว็บไซต์
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
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
                    <a href="/news/list" class="{{ Request::segment(1) === 'news' ? 'active' : null }} nav-link ">
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i
                            class="nav-icon fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
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
