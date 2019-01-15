@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row m-t-40">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="text-center m-b-20">{{ trans('backpack::base.login') }}</h3>
            <div class="box">
                <div class="box-body">
                    {!! Form::open(['url'=>'login', 'class'=>'col-md-12 p-t-10']) !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            {!! Form::label('username', 'Username', ['class'=>'control-label']) !!}
                            <div>
                                {!! Form::text('username', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class'=>'control-label']) !!}
                            <div>
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                      {!! Form::checkbox('remember')!!} Ingat saya
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                 </button>

                                 
                             </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
            <div class="text-center m-t-10">  

            <a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa password</a>
             </div>
        </div>
    </div>
</div>
@endsection
