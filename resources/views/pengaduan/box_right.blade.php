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
                            <td>Kode</td>
                            <td>Pelapor</td>
                            <td>Nama Ruangan</td>
                            <td>Kategori</td>
                            <td>Deskripsi</td>
                            <td>Tanggal</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $user = Auth::user()->roles;
                            $tempat = Auth::user()->tempats;
                            
                        @endphp
                        @foreach ($user as $us)
                            @if ($us->id == 1)
                                @include('pengaduan.admin_sudah_digabung')
                            @endif
                            @if ($us->id == 3)
                                @foreach ($tempat as $lokasi)
                                    @foreach ($lokasi->child as $el)
                                      @include('pengaduan.pengawas_sudah_digabung')
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>