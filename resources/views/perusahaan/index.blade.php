@extends('vendor.backpack.base.layout')
 
@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Perusahaan</li>
              </ol>
            </nav>
            <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title">Daftar Alamat Perusahaan</h2>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                 <p><a class="btn btn-primary" href="{{ route('perusahaan.create') }}">Tambah</a></p> 
                 
                   <div class="table-responsive">
                        <table id="example" class="display stripe responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Provinsi</th>
                                    <th>Kota</thd>
                                    <th>Kecamatan</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($perusahaan as $log)
                                    <tr>   
                                        <td>
                                            {{ $log->nama }}
                                        </td> 
                                        <td>{{ $log->provinsi }}</td>
                                        <td>{{ $log->kota }}</td>
                                        <td>{{ $log->kecamatan }}</td>
                                        <td><span class="aria-hidden="true" data-toggle="tooltip" title="{{ $log->detail }}">{{ str_limit($log->detail, $limit = 25, $end = '...') }}</span></td>
                                        <td> @include('perusahaan.action')
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Provinsi</th>
                                    <th>Kota</thd>
                                    <th>Kecamatan</th>
                                    <th>Detail Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $perusahaan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('before_scripts')
    @if (session()->has('flash_notification'))
        @include('partials._pusher', ['message' => session()->get('flash_notification.message')])
    @endif
   
@endsection