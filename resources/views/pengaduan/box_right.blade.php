<div class="col-md-12">
    <div class="box box-solid box-primary">
        
        <div class="box-header with-border">
            <h2 class="panel-title">{{ __('Pengaduan yang sudah digabungkan') }}

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body">
           <div class="table-responsive">
                <table class="display responsive nowrap compact example">
                    <thead>
                        <tr>
                            <td>Pelapor</td>
                            <td>Nama Ruangan</td>
                            <td>Deskripsi</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($duplikats as $log)
                           <tr>
                               <td>{{ $log->pengaduans->first()->users->name }} <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}""><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></a></td>
                               @include('partials.pengaduan_users', ['object' => $log])

                               <td>{{ $log->pengaduans->first()->tempats->nama }}</td>
                                
                               <td><a data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}">{{ $log->deskripsi }}</a></td>
                               @include('partials.deskripsi_duplikat', ['object' => $log])
                               @if (!isset($log->penanganans))
                               <td><a class="btn btn-primary btn-xs" href="{{ route('pengaduan.tangani', $log->id) }}">Tangani</a></td>
                               @else
                               <td><a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal-petugas' }}" class="btn btn-primary btn-xs">Ditangani</a></td>
                               @include('partials.modal_petugas', ['object' => $log])
                               @endif
                           </tr> 
                           @empty
                            <tr>
                                <td colspan="2">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>