<div class="modal fade" id="{{ $log->pengajuans->penanganans->duplikats->id . 'modal' }}">
<div class="modal-dialog"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Detail Seluruh Pengaduan</h3>     
      </div>
      <div class="modal-body scrollable">
        <div class="table-responsive">
        <table class="table table-striped table-responsive ">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Pelapor</th>
              <th>Ruang</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>Kode</th>
              <th>Pelapor</th>
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