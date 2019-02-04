@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Pengaduan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
              </ol>
            </nav>
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ __('Pengaduan') }}</h2>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
                </div>
                    <div class="box-body">
                    {!! Form::open(['url' => route('pengaduan.merges'),
                    'method' => 'post', 'class'=>'form-horizontal']) !!}
                    @if (isset($sudah_ada))
                        <div class="form-group{{ $errors->has('ada') ? ' has-error' : '' }} row">
                        {!! Form::label('ada', 'Pilih', ['class'=>'col-sm-4 control-label']) !!}
                        <div class="col-md-6">
                        @php
                          $user = Auth::user()->roles;
                          $tempat = Auth::user()->tempats;
                          $duplikat = App\Duplikat::all();
                        @endphp
                        @foreach ($user as $key)

                        @if ($key->id == 1) 
                            {!! Form::select('duplicate_id', [''=>'']+App\Duplikat::pluck('deskripsi','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Pengaduan']) !!}
                        @endif

                                       @if ($key->id == 3)
                                        {!! Form::select('duplicate_id', [''=>'']+Auth::user()->duplikats()->pluck('deskripsi','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Pengaduan']) !!}

                                        @endif
                         
                            @foreach ($tempat as $key)
                                @foreach ($key->child as $log)

                                    @foreach ($duplikat as $el)

                                    @endforeach

                                @endforeach
                            @endforeach
                        @endforeach
                            {!! $errors->first('ada', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    @else
                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }} row">
                        {!! Form::label('deskripsi', 'Deskripsi', ['class'=>'col-sm-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('deskripsi',null, ['class'=>'form-control', 'rows'=>'3']) !!}
                            {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
                        </div>
                    @endif
                        @foreach($pengaduan as $log)
                        <input type="hidden" name="duplikat[]" value="{{ $log->id }}">
                        @endforeach
                    </div>     
                    <div class="form-group row mb-0">
                        <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit('Gabungkan', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>           
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
