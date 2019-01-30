
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
                @foreach ($log->pengaduans as $el)
              <tr>

                <td>PE{{ $el->id }}</td>
                <td>{{ $el->users->name }}</td>
                <td>{{ $el->tempats->nama }}</td>
                <td>{{ $el->kategoris->nama }}</td>
                <td>
                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $el->deskripsi }}">{{ str_limit($el->deskripsi, $limit = 10, $end = '...') }} </a>
                </td>
                <td>{{ $el->created_at->format('d/m/Y H:i') }}</td>
                <td>
                  {!! Form::open(['url' => route('pengaduan.gabungkan.hapus', $el->id), 'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
                      <button type="submit" class="btn btn-link"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>
                  {!! Form::close() !!}
                </td>
              </tr>
                @endforeach
          </tbody>
        </table>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->