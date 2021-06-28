@extends('layouts.app')
@section('title', 'ไม่สามารถใช้งานได้')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ไม่สามารถใช้งาน') }} </div>
                    <div class="card-body text-center">
                        <i class="fas fa-user-alt-slash fa-10x"></i><br><br><br>
                        <h5>บัญชีนี้ยังไม่ได้รับการอนุมัติสิทธิ์การใช้งานจากผู้ดูแลระบบ</h5><br>
                        @role('writer')
                        <a href="/dashboard" class="btn btn-info">กลับหน้าหลัก</a>

                        @endrole

                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
