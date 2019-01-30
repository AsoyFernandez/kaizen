
<div class="modal fade" id="{{ $log->id . 'modal' }}">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Detail Seluruh Pengaduan</h3>
        <hr>
        <table class="table table-striped" id="tblGrid">
          <thead id="tblHead">
            <tr>
              <td>Kode</td>
              <td>Pelapor</td>
              <td>Ruang</td>
              <td>Kategori</td>
              <td>Deskripsi</td>
              <td>Tanggal</td>
              <td>Action</td>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-body scrollable">
        <table class="table table-striped" id="tblGrid">
          <tbody class="scrollable">
            @for ($i = 0; $i < 30; $i++)
              <tr>
                <td>PE{{ $log->pengaduans[0]->id }}</td>
                <td>{{ $log->pengaduans[0]->users->name }}</td>
                <td>{{ $log->pengaduans[0]->tempats->nama }}</td>
                <td>{{ $log->pengaduans[0]->kategoris->nama }}</td>
                <td>
                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $log->pengaduans[0]->deskripsi }}">{{ str_limit($log->pengaduans[0]->deskripsi, $limit = 10, $end = '...') }} </a>
                </td>
                <td>{{ $log->pengaduans[0]->created_at->format('d/m/Y H:i') }}</td>
                <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
              </tr>
            @endfor
          </tbody>
        </table>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->