<div class="col-md-6">
    <div class="box box-solid box-default">
        <div class="box-header with-border">

            <h2 class="panel-title">{{ __('Pengaduan Baru') }}

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
                <table class="display responsive nowrap compact example">
                    <thead>
                        <tr>
                            
                            <td>Pelapor</td>
                            <td>Nama Ruangan</td>
                            <td>Deskripsi</td>
                            <td></td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengaduan as $log)
                            @if ($log->duplikats->count() == 0)
                            <tr>    
                                <td><a href="{{ route('pengaduan.show', $log->id) }}">
                                    {{ $log->users['name'] }}
                                    
                                    </a>
                                </td>
                                <td>{{ $log->tempats->nama }}</td>
                                
                                <td><a  data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}">{{ str_limit($log->deskripsi, $limit = 15, '...') }}</a></td>
                                <td>
                                
                                <input type="checkbox" id="duplikat" name="duplikat[]" value="{{ $log->id }}">
                                
                                </td>

                                @include('partials.close')
                                @if(!isset( $log->penanganans ))
                                <td>
                                @include('pengaduan.action')</td>
                                @else
                                <td>
                                    @if (Auth::id() == $log->where('id', $log->id)->first()->user_id)
                                    <a class="btn btn-info btn-xs disabled" href="">Sedang Di Tangani</a>
                                    @else
                                    ga ada
                                    @endif
                            </td>
                                @endif
                                
                            </tr>
                                @include('partials.deskripsi_pengaduan', ['object' => $log])
                            @endif
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