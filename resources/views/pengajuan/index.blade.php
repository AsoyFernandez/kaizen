@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Pengajuan</li>
            </ol>
        </nav>
        <div class="box box-default">
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
                                    <td>Pelapor</td>
                                    <td>Petugas</td>
                                    <td>Nama Ruangan</td>
                                    <td>Deskripsi</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajuan as $log)
                                <tr>
                                    <td>{{ $log->penanganans->duplikats->pengaduans->first()->users->name}}</td>
                                    <td>{{ $log->penanganans->users->name }}</td>
                                    <td>{{ $log->penanganans->duplikats->pengaduans->first()->tempats->nama }}</td>
                                    <td>{{ $log->deskripsi }}</td>
                                    
                                    @forelse($log->status as $key)
                                        @if ($key->status == 0)
                                            <td>Ditolak</td>
                                        @else
                                            <td>Diterima</td>
                                        @endif
                                    @empty
                                    <td><a data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}" class="btn btn-xs btn-primary">Tolak</a>
                                     <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}" class="btn btn-xs btn-primary">Terima</a>
                                @include('partials.pengawas_terima', ['object' => $log])</td>
                                    @endforelse

                                </tr>
                                @include('partials.pengawas_tolak', ['object' => $log])
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
