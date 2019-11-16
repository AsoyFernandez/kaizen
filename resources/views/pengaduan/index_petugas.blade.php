@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
              </ol>
            </nav>


            <div class="box box-default">
                <div class="box-header with-border">

                    <h2 class="panel-title">{{ __('Pengaduan') }}

                    <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                </div>
                <div class="box-body">
                 <p>
                     @include('partials.open')
                     
                 </p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact">
                            <thead>
                                <tr>
                                    
                                    <td>Pelapor</td>
                                    <td>Nama Ruangan</td>
                                    <td>Deskripsi</td>
                                    <td>Tanggal</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($duplikats as $log)
                                 @if (!isset($log->penanganans))
                                 @php
                                     $user = Auth::user();
                                 @endphp
                                 @foreach ($user->tempats as $key)
                                     @if ($key->id == $log->pengaduans->first()->tempats->id)
                                         {{-- expr --}}
                                 <tr>
                                    
                                     <td>{{ $log->pengaduans->first()->users->name }} <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></a></td>
                                     @include('partials.pengaduan_users', ['object' => $log])

                                     <td>{{ $log->pengaduans->first()->tempats->nama }}</td>

                                     <td><a data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}">{{ $log->deskripsi }}</a></td>
                                     @include('partials.deskripsi_duplikat', ['object' => $log])

                                     <td>{{ $log->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
                                    
                                     <td><a class="btn btn-primary btn-xs" href="{{ route('pengaduan.tanganin', $log->id) }}">Tangani</a></td>
                                     </tr> 
                                     @endif
                                 @endforeach
                                 @endif
                                 @empty
                                  <tr>
                                      <td colspan="2">Tidak ada data</td>
                                  </tr>
                              @endforelse
                            </tbody>
                            <tfoot>
                                <td>Pelapor</td>
                                    <td>Nama Ruangan</td>
                                    <td>Deskripsi</td>
                                    <td>Tanggal</td>
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