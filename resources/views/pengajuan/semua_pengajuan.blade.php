@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Semua Pengajuan</li>
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
                                    <th>Petugas</th>
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
                                @foreach (Auth::user()->tempats as $e)
                                @foreach ($e->child as $el)
                                    @foreach (Auth::user()->roles as $role)
                                    {{-- Admin --}}
                                    @if ($role->id == 3)
                                        
                                            @if ($log->duplikats->lokasi_id == $el->id)
                                                
                                            <tr>
                                                <td>GA{{ $log->duplikats->id }} <a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->duplikats->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                                                @include('pengajuan.seluruhPengaduan', ['object' => $log])</td>
                                                <td>{{ $log->users->name }}</td>
                                                <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                                                <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                                                <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $log->duplikats->deskripsi }}">{{ $log->duplikats->deskripsi }}</a></td>

                                                <td>{{ $log->duplikats->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
                                                @include('pengajuan.status')

                                                @if (!isset($log->status))

                                                @include('pengajuan.action')
                                                @endif
                                            </tr>
                                            @endif
                                        @endif
                                    {{-- Pengawas --}}
                                    @endforeach
                                @endforeach
                            @endforeach

                            @foreach (Auth::user()->roles as $role)
                                @if ($role->id == 1)
                                    <tr>
                                        <td>GA{{ $log->duplikats->id }} <a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->duplikats->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                                                @include('pengajuan.seluruhPengaduan', ['object' => $log])</td>
                                        <td>{{ $log->users->name }}</td>
                                        <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                                        <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                                        <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $log->duplikats->deskripsi }}">{{ $log->duplikats->deskripsi }}</a></td>

                                        <td>{{ $log->duplikats->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
                                        
                                        @include('pengajuan.status')

                                        <td>@include('pengajuan.view') </td> 
                                    </tr>
                                @endif
                            @endforeach
{{-- Pengawas --}}
                                @empty
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kel. Pengaduan</th>
                                    <th>Petugas</th>
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
