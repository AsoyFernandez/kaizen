@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
              </ol>
            </nav>


            <div class="box box-default">
                <div class="box-header with-border">

                    <h2 class="panel-title">{{ __('Semua Pengaduan') }}

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
                            @php
                                $user = Auth::user()->roles;
                                $tempat = Auth::user()->tempats;     
                            @endphp
                            <thead>
                                <tr>                         
                                    <td>Kode</td>
                                    <td>Nama Ruangan</td>
                                    <td>Kategori</td>
                                    <td>Deskripsi</td>
                                    <td>Tanggal</td>
                                    @foreach (Auth::user()->roles as $key)
                                    @if ($key->id == 1 or $key->id == 3)
                                        <td>Status</td>
                                    @endif
                                    @endforeach
                                    @foreach (Auth::user()->roles as $key)
                                    @if ($key->id == 1  || $key->id == 4)
                                        <td>Action</td>
                                    @endif
                                    @endforeach   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->roles as $key)
                                    @if ($key->id == 1)
                                      @forelse ($pengaduan as $log)
                                        <tr>  
                                            <td>PE{{ $log->id }}</td>
                                            <td>
                                                {{ $log->tempats->nama }}
                                                @include('partials.simbol_pengaduan')
                                            </td>
                                            <td>{{ $log->kategoris->nama }}</td>
                                            <td>{{ $log->deskripsi }}</td>
                                            <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                            @include('partials.status_pengaduan') 
                                            <td>@include('pengaduan.action')</td>
                                        </tr>
                                      @empty
                                      @endforelse
                                        
                                    @endif
                                    @if ($key->id == 3)
                                        @foreach (Auth::user()->tempats as $lokasi)
                                            @foreach ($lokasi->child as $el)
                                                @forelse ($pengaduan as $log)
                                                    @if ($log->lokasi_id == $el->id)
                                                        <tr>  
                                                            <td>PE{{ $log->id }}</td>
                                                            <td>
                                                                {{ $log->tempats->nama }}
                                                                @include('partials.simbol_pengaduan')
                                                            </td>
                                                            <td>{{ $log->kategoris->nama }}</td>
                                                            <td>{{ $log->deskripsi }}</td>
                                                            <td>{{ $log->created_at->format('d/m/Y H:i') }}</td> 
                                                            @include('partials.status_pengaduan') 
                                                        </tr>
                                                    @endif
                                              @empty
                                              @endforelse   
                                            @endforeach
                                        @endforeach
                                    @endif

                                    @if ($key->id == 4)
                                        @foreach ($tempat as $lokasi)
                                                @forelse ($duplikat as $log)
                                                @if (!isset($log->penanganans))
                                                    @if ($log->pengaduans->first()->lokasi_id == $lokasi->id)
                                                        <tr>  
                                                            <td>GA{{ $log->id }}</td>
                                                            <td>
                                                                {{ $log->pengaduans->first()->tempats->nama }}
                                                                @include('partials.simbol_gabungan')
                                                            </td>
                                                            <td>{{ $log->pengaduans->first()->kategoris->nama }}</td>
                                                            <td>{{ $log->deskripsi }}</td>
                                                            <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                                            <td><a class="btn btn-primary btn-xs" href="{{ route('pengaduan.tangani', $log->id) }}">Tangani</a></td>
                                                        </tr>
                                                    @endif
                                                @endif
                                              @empty
                                              @endforelse
                                        @endforeach
                                    @endif

                                @endforeach
                            </tbody>
                            <tfoot>
                                <td>Kode</td>
                                    <td>Nama Ruangan</td>
                                    <td>Kategori</td>
                                    <td>Deskripsi</td>
                                    <td>Tanggal</td>
                                    @foreach (Auth::user()->roles as $key)
                                    @if ($key->id == 1  || $key->id == 3)
                                        <td>Status</td>
                                    @endif
                                    @endforeach
                                    @foreach (Auth::user()->roles as $key)
                                    @if ($key->id == 1 || $key->id == 4)
                                        <td>Action</td>
                                    @endif
                                    @endforeach  
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