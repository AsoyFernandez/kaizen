@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Penanganan</li>
            </ol>
        </nav>  
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h2 class="panel-title">{{ __('Penanganan') }}</h2>
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
                                    <th>Kode</th>
                                    @if (Request::route()->getName() == 'semua.penanganan')
                                        <th>Petugas</th>
                                    @endif
                                    <th>Pelapor</th>
                                    <th>Nama Ruangan</th>
                                    <th>Kategori</th>
                                    <th>Lampiran</th>
                                    <th>Status</th>
                                    @if (Request::route()->getName() != 'semua.penanganan')
                                    <th>Action</th>
                                    @endif
                                    @if (Request::route()->getName() == 'semua.penanganan')
                                    @foreach (Auth::user()->roles as $el)
                                        @if ($el->id == 1)
                                        <th>Action</th>
                                        @endif
                                    @endforeach
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penanganan as $log)
                                {{-- PenangananKu --}}
                                @if (Request::route()->getName() != 'semua.penanganan')
                                @if ($log->users->id == Auth::id())
                                <tr>
                                    <td>GA{{ $log->duplikats->id }}<a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                                    @include('partials.penanganan_detail')</td>
                                    <td>{{ $log->duplikats->pengaduans->first()->users->name }}</td>
                                    <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                                    <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                                    <td><a href="{{ route('lampiran.unduh', $log->id) }}" class="btn btn-primary btn-sm glyphicon glyphicon-save">Unduh</a></td>
{{-- Status --}}
                                    @if(App\Pengajuan::where('penanganan_id',$log->id)->first() != null && !isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status))
                                        <td>Menunggu konfirmasi
                                        </td> 
                                    @endif


                                    @if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 0)
                                        <td>Ditolak</td>
                                    @endif


                                    @if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 1 && is_null(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->orderBy('created_at', 'desc')->first()->penilaian))
                                        <td>Diterima</td>
                                    @endif

                                    @if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 1 && !is_null(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->orderBy('created_at', 'desc')->first()->penilaian))
                                        <td>Dinilai</td>
                                    @endif

{{-- Action  --}}
                                    @include('penanganan.action')
                                    
                                </tr>    
                                @endif
                                @endif
                                {{-- PenangananKu --}}
                                
                                {{-- Semua Penanganan --}}
                                @if (Request::route()->getName() == 'semua.penanganan')
                                @foreach (Auth::user()->roles as $k)
                                {{-- Admin --}}
                                    @if ($k->id == 1)
                                    <tr>
                                        <td>GA{{ $log->duplikats->id }}<a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                                    @include('partials.penanganan_detail')</td>
                                        <td>{{ $log->users['name'] }}</td>
                                        <td>{{ $log->duplikats->pengaduans->first()->users->name }}</td>
                                        <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                                        <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                                        <td><a href="{{ route('lampiran.unduh', $log->id) }}" class="btn btn-primary btn-sm glyphicon glyphicon-save">Unduh</a></td>
                                        @include('penanganan.status')
                                    </tr>
                                    @endif
                                {{-- Admin --}}
                                {{-- Pengawas --}}
                                    @if ($k->id == 3)
                                        @foreach (Auth::user()->tempats as $e)
                                            @foreach ($e->child as $el)
                                            @if ($el->id == $log->duplikats->lokasi_id)
                                                <tr>
                                                <td>GA{{ $log->duplikats->id }}<a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                                            @include('partials.penanganan_detail')</td>
                                                <td>{{ $log->users['name'] }}</td>
                                                <td>{{ $log->duplikats->pengaduans->first()->users->name }}</td>
                                                <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                                                <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                                                <td><a href="{{ route('lampiran.unduh', $log->id) }}" class="btn btn-primary btn-sm glyphicon glyphicon-save">Unduh</a></td>
                                                @include('penanganan.status')
                                            </tr> 
                                            @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                {{-- Pengawas --}}
                                @endforeach
                                @endif
                                {{-- Semua Penanganan --}}
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode</th>
                                    @if (Request::route()->getName() == 'semua.penanganan')
                                        <th>Petugas</th>
                                    @endif
                                    <th>Pelapor</th>
                                    <th>Nama Ruangan</th>
                                    <th>Kategori</th>
                                    <th>Lampiran</th>
                                    <th>Status</th>
                                    @if (Request::route()->getName() != 'semua.penanganan')
                                    <th>Action</th>
                                    @endif
                                    @if (Request::route()->getName() == 'semua.penanganan')
                                    @foreach (Auth::user()->roles as $el)
                                        @if ($el->id == 1)
                                        <th>Action</th>
                                        @endif
                                    @endforeach
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                        {{ $penanganan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
