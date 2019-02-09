<div class="col-md-12">
    <div class="box box-solid box-primary">
        
        <div class="box-header with-border">
            <h2 class="box-title">{{ __('Pengaduan yang sudah digabungkan') }}</h2>

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
                            <th>Kel. Pengaduan</th>
                            <th>Pelapor</th>
                            <th>Nama Ruangan</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            @foreach (Auth::user()->roles as $key)
                                @if ($key->id == 3 or $key->id == 4)
                            <th>Action</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $user = Auth::user()->roles;
                            $tempat = Auth::user()->tempats;
                            
                        @endphp
                        @foreach (Auth::user()->roles as $us)
                            @if ($us->id == 1)
                                @include('pengaduan.admin_sudah_digabung')
                            @endif
                            @if ($us->id == 3)
                                @foreach (Auth::user()->tempats as $lokasi)
                                    @foreach ($lokasi->child as $el)
                                      @include('pengaduan.pengawas_sudah_digabung')
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach

                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kel. Pengaduan</th>
                            <th>Pelapor</th>
                            <th>Nama Ruangan</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            @foreach (Auth::user()->roles as $key)
                                @if ($key->id == 3 or $key->id == 4)
                            <th>Action</th>
                                @endif
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>