{!! Form::open(['url' => route('penanganan.create'),'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal']) !!}
    <input type="hidden" name="penanganan_id" value="{{ $penanganan }}"> 
    {!! Form::submit('Ajukan', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}