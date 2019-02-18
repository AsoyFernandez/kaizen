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
                                    <td>Total Pengaduan</td>
                                    <td>Nilai Akhir</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $e)
                                    @if ($e->penanganans->count() != 0)
                                    @foreach ($e->penanganans as $el)
                                        @if ($el->duplikats->penilaian != null)
                                            <tr>
                                                <td>{{ $e->name }}</td>
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($e->penanganans as $penanganan)
                                                @php
                                                if (!is_null($penanganan->duplikat_id)) {
                                                 if (!is_null($penanganan->duplikats->nilai_id)) {
                                                    $count ++;
                                                 }
                                                }
                                                @endphp
                                                @endforeach
                                                <td>{{ $count }}</td>
                                                @php
                                                    $count = 0;
                                                @endphp
                                                <td>{{ $e->rating() }}</td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
