@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('area.index') }}">Area</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Area</li>

              </ol>
            </nav>
            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ __('Tambah Area') }}</h2>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
                </div>
                    <div class="box-body">
                        {!! Form::open(['url' => route('area.store'),
                        'method' => 'post',  'class'=>'form-horizontal']) !!}
                            @include('area._form')                 
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
