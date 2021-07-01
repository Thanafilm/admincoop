@extends('master')
@section('title', 'โปรไฟล์')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-user-cog"></i> แก้ไขโปรไฟล์ </h4>
            </div>
            <!-- /.card-header -->
            <div class="container">
                <div class="card-body">
                    {!! Form::model($user, ['method' => 'POST', 'route' => ['Profile.Update']]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>รูปโปรไฟล์</strong>
                                <img src="{{ $user->avatar }}" class="rounded mx-auto d-block"
                                    style="max-width:400px;max-height: 300px; border-radius: 50%;" ><br>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <!-- /.card-body -->
        </div>
    </div>

@endsection
