@extends('layouts.app')
@section('title','ลงชื่อเข้าใช้')
@section('content')
    <div class="container " >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ระบบจัดการเว็บแอปพลิเคชันสหกิจศึกษา') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3 text-center">
                                    <img src="{{ asset('/ict_tran.png') }}" style="max-width:70%;
                                    height: auto;"/><br><br>

                                    <a class="btn btn-primary btn-block" href="{{ route('Login.Azure') }}">Login with
                                        Microsoft</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
