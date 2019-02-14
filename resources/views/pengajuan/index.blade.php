@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Pengajuan</li>
            </ol>
        </nav>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h2 class="panel-title">{{ __('Pengajuan') }}</h2>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <div class="box-body">
                    
                        <div class="table-responsive">
                         <table id="example" class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th>Kel. Pengaduan</th>
                                    @if (Request::route()->getName() == 'semua.pengajuan')
                                    <th>Petugas</th>
                                    @endif
                                    <th>Nama Ruangan</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penanganan as $log)
                                @include('pengajuan.pengajuanku')
                                {{-- Pengawas --}} 
                                {{-- Pengawas --}}
                                @empty
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kel. Pengaduan</th>
                                    @if (Request::route()->getName() == 'semua.pengajuan')
                                    <th>Petugas</th>
                                    @endif
                                    <th>Nama Ruangan</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
