<div id="{{ $object->id . 'modals' }}" class="modal fade" role="dialog">
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
                <input type="hidden" id="duplikat" name="duplikat" value="{{ $object->pengajuans->penanganans->duplikats->id }}">

                <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }} row">
                  <div class="col-md-12 col-md-offset-2">
                  {!! Form::label('nilai', 'Nilai', ['class'=>'col-sm-2 control-label']) !!}   
                    <div class="col-md-6"> 
                        <input type="number" name="nilai" id="Demo" class="rating" data-clearable="remove"/>
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
@section('before_scripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('input.rating').rating({
  'min': 1,
  'max': 5,
  'empty-value': 0,
  'iconLib': 'glyphicon',
  'activeIcon': 'glyphicon-star',
  'inactiveIcon': 'glyphicon-star-empty',
  'clearableIcon': 'glyphicon-remove',
  'inline': true,
  'readonly': false,
  'copyClasses': true
});
  })
</script>
@endsection