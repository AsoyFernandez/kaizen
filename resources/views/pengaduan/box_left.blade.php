<div class="col-md-12">
    <div class="box box-solid box-default">
        <div class="box-header with-border">

            <h2 class="panel-title">{{ __('Pengaduan yang diterima') }}

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
                            <td>Kode</td>
                            <td>Pelapor</td>
                            <td>Nama Ruangan</td>
                            <td>Kategori</td>
                            <td>Deskripsi</td>
                            <td>Tanggal</td>
                            <td></td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $user = Auth::user()->roles;
                            $tempat = Auth::user()->tempats;
                            
                        @endphp
                        @foreach ($user as $key)
                            @if ($key->id == 1)
                                @include('pengaduan.index_admin_gabungkan')
                            @endif
                            @if ($key->id == 3)
                                @foreach ($tempat as $log)
                                    @foreach ($log->child as $el)
                                        @include('pengaduan.index_pengawas_gabungkan')
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