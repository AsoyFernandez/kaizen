@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('penanganan.index') }}">Daftar Penanganan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Lampiran</li>
              </ol>
            </nav>
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ __('Ubah Detail Lampiran') }}</h2>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
                </div>
                    <div class="box-body">
                        {!! Form::model($penanganan, ['url' => route('penanganan.update', $penanganan->id),
                        'method' => 'put', 'files'=>'true',  'class'=>'form-horizontal']) !!}
                            @include('pengaduan.tangani')                 
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
