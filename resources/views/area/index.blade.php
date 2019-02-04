@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Area</li>
              </ol>
            </nav>
            <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title">Daftar Area</h2>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                  <p><a class="btn btn-primary" href="{{ route('area.create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Area</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @forelse ($area as $log)
                                    <tr>   
                                        <td>
                                            {{ $log->perusahaan->nama }}
                                        </td>
                                        <td>{{ $log->nama }}</td>
                                        <td> @include('area.action')
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
                                    <th>Area</th>
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
