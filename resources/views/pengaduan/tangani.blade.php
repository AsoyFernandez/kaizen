@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Pengaduan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penanganan</li>
              </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ __('Lampirkan Rencana Tindak') }}</h2></div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('pengaduan.tangani', $pengaduan->id),
                    'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('lampiran') ? ' has-error' : '' }} row">
                          {!! Form::label('lampiran', 'Lampiran', ['class'=>'col-sm-4 control-label']) !!}   
                            <div class="col-md-6"> 
                                {!! Form::file('lampiran', ['class'=>'form-control col-form-label ']) !!}
                                {!! $errors->first('lampiran', '<p class="help-block">:message</p>') !!}
                            </div>
                      </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Lampirkan', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
