@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">

        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Beri Nilai</li>
            </ol>
            </nav>
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="panel-title">{{ __('Penilaian') }}</h2>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                 <table id="example" class="display responsive nowrap compact">
@if (Auth::user()->hasRole([2]))
                    <thead>
                        <tr>
                            <td>Kel. Pengaduan</td>
                            <td>Petugas</td>
                            <td>Nama Ruangan</td>
                            <td>Deskripsi</td>
                            <td>Action</td>
                        </tr>

                    </thead>
                    <tbody>
                            @foreach ($status as $log)
                            @if ($log->status == 1)
                        <tr>
@include('penilaian.tolak', ['object' => $log])
                            <td>GA{{ $log->pengajuans->penanganans->duplikats->id }}
@include('penilaian.pengaduan_detail', ['object' => $log])</td>
                            <td>{{ $log->pengajuans->penanganans->users->name }}</td>
                            <td>{{ $log->pengajuans->penanganans->duplikats->pengaduans->first()->tempats->nama }}</td>
                            <td>{{ $log->pengajuans->deskripsi }}</td>
                            <td>     
@include('penilaian.action')
                            </td>
                        </tr>
                            @endif
                            @endforeach
                    </tbody>
@endif
@if (Auth::user()->hasRole([1]))
                    <thead>
                        <tr>
                            <td>Kel. Pengaduan</td>
                            <td>Petugas</td>
                            <td>Nama Ruangan</td>
                            <td>Nilai</td>
                            <td>Deskripsi</td>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($status as $log)
                            @if ($log->status == 1)
                        <tr>
                            <td>GA{{ $log->pengajuans->penanganans->duplikats->id }}
@include('penilaian.pengaduan_detail', ['object' => $log])</td>
                            <td>{{ $log->pengajuans->penanganans->users->name }}</td>
                            <td>{{ $log->pengajuans->penanganans->duplikats->pengaduans->first()->tempats->nama }}</td>
                            <td>{{ $log->penilaian->nilai }}</td>
                            <td>{{ $log->pengajuans->deskripsi }}</td>
                        </tr>
                            @endif
                        @endforeach
                    </tbody>
@endif
@if (Auth::user()->hasRole([4]))
                    <thead>
                        <tr>
                            <td>Kel. Pengaduan</td>
                            <td>Petugas</td>
                            <td>Nama Ruangan</td>
                            <td>Nilai</td>
                            <td>Deskripsi</td>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach (Auth::user()->tempats as $el)
                            @foreach ($status as $log)
                            
                                @if ($log->status == 1 && $log->pengajuans->penanganans->duplikats->tempats->id == $el->id)
                            <tr>
                                <td>GA{{ $log->pengajuans->penanganans->duplikats->id }}
    @include('penilaian.pengaduan_detail', ['object' => $log])</td>
                                <td>{{ $log->pengajuans->penanganans->users->name }}</td>
                                <td>{{ $log->pengajuans->penanganans->duplikats->pengaduans->first()->tempats->nama }}</td>
                                <td>{{ $log->penilaian->nilai }}</td>
                                <td>{{ $log->pengajuans->deskripsi }}</td>
                            </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
@endif
                </table>
            </div>                
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
