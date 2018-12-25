@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
              </ol>
            </nav>
        </div>

            @include('pengaduan.box_left')
            @include('pengaduan.box_right')
    </div>
</div>
@endsection
@section('after_scripts')
    
@endsection