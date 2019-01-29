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


            <div class="box box-default">
                <div class="box-header with-border">

                    <h2 class="panel-title">{{ __('Pengaduan Ku') }}

                    <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                </div>
                <div class="box-body">
                 <p>
                     <a class="btn btn-primary" href="{{ route('pengaduan.create') }}">Tambah</a>
                     
                 </p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact">
                            <thead>
                                <tr>
                                    
                                    <td>Kode</td>
                                    <td>Nama Ruangan</td>
                                    <td>Kategori</td>
                                    <td>Deskripsi</td>
                                    <td>Tanggal</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($pengaduan as $log)
                                    <tr>  
                                    <td>PE{{ $log->id }}</td>
                                    <td>
                                        {{ $log->tempats->nama }}
                                        @if ($log->keamanan == 1)
                                            <span class="glyphicon glyphicon-fire"></span>
                                        @endif
                                        @if ($log->kerugian == 1)
                                            <span class="glyphicon glyphicon-warning-sign"></span>
                                        @endif
                                    </td>
                                    <td>{{ $log->kategoris->nama }}</td>
                                    <td>{{ $log->deskripsi }}</td>
                                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                    @if ($log->duplikats->count() == 0)
                                        <td>Belum Ditinjau</td>
                                    @endif
                                    @if ($log->duplikats->count() != 0)
                                        
                                        @foreach ($log->duplikats as $element)
                                        @if (is_null($element->penanganans))
                                            <td>Belum Ditangani</td>
                                        @endif
                                        @if (!is_null($element->penanganans))
                                            <td>Sedang Ditangani</td>
                                        @endif
                                    @endforeach
                                        @if ($log->duplikats == '[]')
                                            <td>Belum Ditinjau</td>
                                        @endif

                                    @endif
                                    <td>@include('pengaduan.action')</td>
                                </tr>
                              @empty
                              @endforelse
                            </tbody>
                            <tfoot>
                                <td>Kode</td>
                                    <td>Nama Ruangan</td>
                                    <td>Kategori</td>
                                    <td>Deskripsi</td>
                                    <td>Tanggal</td>
                                    <td>Status</td>
                                    <td>Action</td>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('after_scripts')
    
@endsection