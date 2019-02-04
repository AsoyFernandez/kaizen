<div class="col-md-12">
    <div class="box box-solid box-default">
        <div class="box-header with-border">

            <h2 class="box-title">{{ __('Pengaduan yang diterima') }}</h2>

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
                            <th>Kode</th>
                            <th>Pelapor</th>
                            <th>Nama Ruangan</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th></th>
                            @foreach (Auth::user()->roles as $key)
                                @if ($key->id == 1)
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
                        @foreach (Auth::user()->roles as $key)
                            @if ($key->id == 1)
                                @include('pengaduan.index_admin_gabungkan')
                            @endif
                            @if ($key->id == 3)
                                @foreach (Auth::user()->tempats as $log)
                                    @foreach ($log->child as $el)
                                        @include('pengaduan.index_pengawas_gabungkan')
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach

                               
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode</th>
                            <th>Pelapor</th>
                            <th>Nama Ruangan</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th></th>
                            @foreach (Auth::user()->roles as $key)
                                @if ($key->id == 1)
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