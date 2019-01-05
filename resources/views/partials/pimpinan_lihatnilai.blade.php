
<div id="{{ $object->id . '-modal' }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lihat Nilai</h4>
      </div>
      <div class="modal-body">
            <div class="row">
              {!! Form::model($object->penilaian, ['url' => route('penilaian.update', $object->penilaian->id), 'method' => 'put', 'files'=>'true',  'class'=>'form-horizontal']) !!}

                <input type="hidden" id="status_id" name="status_id" value="{{ $object->id }}">
                <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }} row">
                  <div class="col-md-12 col-md-offset-2">
                  {!! Form::label('nilai', 'Nilai', ['class'=>'col-sm-2 control-label']) !!}   
                    <div class="col-md-6"> 

                      <fieldset class="starability-basic">
                        <legend>First rating:</legend>
                        <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="3" checked aria-label="No rating." />
                        <input type="radio" id="second-rate1" name="rating" value="1" />
                        <label for="second-rate1" title="Terrible">1 star</label>
                        <input type="radio" id="second-rate2" name="rating" value="2" />
                        <label for="second-rate2" title="Not good">2 stars</label>
                        <input type="radio" id="second-rate3" name="rating" value="3" />
                        <label for="second-rate3" title="Average">3 stars</label>
                        <input type="radio" id="second-rate4" name="rating" value="4" />
                        <label for="second-rate4" title="Very good">4 stars</label>
                        <input type="radio" id="second-rate5" name="rating" value="5" />
                        <label for="second-rate5" title="Amazing">5 stars</label>
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