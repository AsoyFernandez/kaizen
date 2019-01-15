<div id="{{ $object->id . 'modals' }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lampirkan Rencana Tindak</h4>
      </div>
      <div class="modal-body">
            <div class="row">
              {!! Form::open(['url' => route('pengaduan.tangani', $object->id), 'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('lampiran') ? ' has-error' : '' }} row">
                  <div class="col-md-12 col-md-offset-2">
                  {!! Form::label('lampiran', 'Lampiran', ['class'=>'col-sm-2 control-label']) !!}   
                    <div class="col-md-6"> 
                        {!! Form::file('lampiran', ['class'=>'form-control col-form-label ']) !!}
                        {!! $errors->first('lampiran', '<p class="help-block">:message</p>') !!}
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
