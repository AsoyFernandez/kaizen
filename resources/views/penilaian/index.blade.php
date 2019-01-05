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
                         <table id="example" class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <td>Petugas</td>
                                    <td>Nama Ruangan</td>
                                    <td>Deskripsi</td>
                                    <td>Action</td>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    @forelse ($status as $log)
                                    <td>{{ $log->pengajuans->penanganans->users->name }}</td>
                                    <td>{{ $log->pengajuans->penanganans->duplikats->pengaduans->first()->tempats->nama }}</td>
                                    <td>{{ $log->pengajuans->deskripsi }}</td>
                                    @if (App\Penilaian::where('status_id',$log->id)->first() != null)
                                        <td><a data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}" class="btn btn-xs btn-primary">Lihat</a></td>
                                        @include('partials.pimpinan_lihatnilai', ['object' => $log])

                                        @else
                                    <td><a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}" class="btn btn-xs btn-primary">Nilai</a></td>
                                    @endif
                                    @empty
                                    @endforelse
                                </tr>
                                @include('partials.pimpinan_nilai', ['object' => $log])
                            </tbody>
                        </table>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
