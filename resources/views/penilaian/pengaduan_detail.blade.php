<div class="modal fade" id="{{ $log->pengajuans->penanganans->duplikats->id . 'modal' }}">
 
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Detail Seluruh Pengaduan</h3>
      </div>
      <div class="modal-body scrollable">
        <div class="table-responsive">
        <table class="table table-striped table-responsive">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Pelapor</th>
              <th>Petugas</th>
              <th>Ruang</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($log->pengajuans->penanganans->duplikats->pengaduans as $el)
                <tr>
                  <td>PE{{ $el->id }}</td>
                  <td>{{ $el->users->name }}</td>
                  <td>{{ $log->pengajuans->penanganans->users->name }}</td>
                  <td>{{ $el->tempats->nama }}</td>
                  <td>{{ $el->kategoris->nama }}</td>
                  <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $el->deskripsi }}">{{ str_limit($el->deskripsi, $limit = 10, $end = '...') }} </a></td>
                  <td>{{ $el->created_at->format('d/m/Y H:i') }}</td>
                  <td><a class="btn btn-primary btn-xs" href="{{ route('pengaduan.unduh', $el->id) }}"><span class=" glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="tooltip" title="Unduh Laporan"></span></a></td>
                </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Kode</th>
              <th>Pelapor</th>
              <th>Petugas</th>
              <th>Ruang</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->