@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lokasi</li>
              </ol>
            </nav>
            <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title">Daftar Lokasi</h2>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                  <p><a class="btn btn-primary" href="{{ route('lokasi.create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Area</th>
                                    <th>Lokasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lokasi as $log)
                                    <tr>   
                                        <td>{{ $log->parent->perusahaan->nama }}</td>
                                        <td> {{ $log->parent->nama }} </td>
                                        <td>{{ $log->nama }}</td>
                                        <td>
                                            @include('lokasi.action')
                                        </td>
                                    </tr>
                                    @include('partials.qrcode', ['object' => $log])
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Area</th>
                                    <th>Lokasi</th>
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
