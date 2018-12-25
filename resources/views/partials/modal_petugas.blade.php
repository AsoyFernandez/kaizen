<div id="{{ $object->id . 'modal-petugas' }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Petugas</h4>
      </div>
      <div class="modal-body" style="overflow: auto">
          <div class="table-responsive">
            <div class="col-md-8 col-md-offset-1">
              <div class="row">
                Nama Petugas : {{ $object->penanganans->users->name }}
              </div>
              <div class="row">
                Foto : @if (!isset($object->penanganans->pengajuans->foto))
                  Sedang dalam penanganan
                @else
                  Sudah ada
                @endif
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>