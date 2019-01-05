<div id="{{ $object->id . 'modal' }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Beri Nilai</h4>
      </div>
      <div class="modal-body">
            <div class="row">
              {!! Form::open(['url' => route('penilaian.store'), 'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal']) !!}

                <input type="hidden" id="status_id" name="status_id" value="{{ $object->id }}">
                <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }} row">
                  <div class="col-md-12 col-md-offset-2">
                  {!! Form::label('nilai', 'Nilai', ['class'=>'col-sm-2 control-label']) !!}   
                    <div class="col-md-6"> 
                      <fieldset class="starability-basic">     
                        <input type="radio" id="rate1" name="nilai" value="1" />
                        <label for="rate1" title="Terrible">1 stars</label>

                        <input type="radio" id="rate2" name="nilai" value="2" />
                        <label for="rate2" title="Not good">2 stars</label>

                        <input type="radio" id="rate3" name="nilai" value="3" />
                        <label for="rate3" title="Average">3 stars</label>

                        <input type="radio" id="rate4" name="nilai" value="4" />
                        <label for="rate4" title="Very good">4 stars</label>

                        <input type="radio" id="rate5" name="nilai" value="5" />
                        <label for="rate5" title="Amazing">5 star</label>
                      </fieldset>
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
