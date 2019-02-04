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


            <div class="box box-solid box-primary">
                <div class="box-header with-border">

                    <h2 class="box-title">{{ __('Pengaduan Ku') }}</h2>

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
                                    
                                    <th>Kode</th>
                                    <th>Nama Ruangan</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                    <td> <span class="aria-hidden="true" data-toggle="tooltip" title="{{ $log->deskripsi }}">{{ str_limit($log->deskripsi, $limit = 25, $end = '...') }}</span></td>
                                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $log->status() }}</td>
                                    <td>@include('pengaduan.action')</td>
                                </tr>
                              @empty
                              @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode</th>
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
@section('after_scripts')
    
@endsection