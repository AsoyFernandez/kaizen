
<div id="{{ $object->id . 'podal' }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Beri Penilaian</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                {!! Form::open(['url' => route('pengaduan.nilai', $object->id),
                    'method' => 'post',  'class'=>'form-horizontal']) !!}
                  
                  {!! Form::radio('rating', '1') !!}
            </div>
        </div>
      </div>
      <div class="modal-footer">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>