
<div id="{{ $object->id . '-modal' }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Nilai</h4>
      </div>
      <div class="modal-body">
            <div class="row">
              {!! Form::model($object->penilaian, ['url' => route('penilaian.update', $object->penilaian->id), 'method' => 'put', 'files'=>'true',  'class'=>'form-horizontal']) !!}

                <input type="hidden" id="status_id" name="status_id" value="{{ $object->id }}">
                <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }} row">
                  <div class="col-md-12 col-md-offset-2">
                  {!! Form::label('nilai', 'Nilai', ['class'=>'col-sm-2 control-label']) !!}   
                    <div class="col-md-6"> 
                        <input type="number" name="nilai" value="{{ $object->penilaian->nilai }}" id="Demo" class="rating" data-clearable="remove"/>
                        {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
                    </div>
                  </div>
              </div>
                
                <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }} row">
                  <div class="col-md-12 col-md-offset-2 ">
                  {!! Form::label('keterangan', 'Deskripsi', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-md-6">
                  {!! Form::textarea('keterangan',null, ['class'=>'form-control', 'rows'=>'3']) !!}
                  {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
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