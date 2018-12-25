@if (isset($lokasi))
	<div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }} row">
		{!! Form::label('lokasi', 'Nama Lokasi', ['class'=>'col-sm-4 control-label']) !!}
		<div class="col-md-6"> 
			<input type="text" value="{{ $lokasi->nama }}" disabled="" class="form-control">
			<input type="hidden" name="lokasi" value="{{ $lokasi->nama }}">
		</div>
	</div>
@else
	<div class="form-group{{ $errors->has('lokasi_id') ? ' has-error' : '' }} row">
		{!! Form::label('lokasi_id', 'Nama Lokasi', ['class'=>'col-sm-4 control-label']) !!}
		<div class="col-md-6"> 
			{!! Form::select('lokasi_id', [''=>'']+App\Tempat::where('tempat_id', '!=', null)->pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Lokasi']) !!}
			{!! $errors->first('lokasi_id', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
@endif

<div class="form-group{{ $errors->has('kategori_id') ? ' has-error' : '' }} row">
	{!! Form::label('kategori_id', 'Pengaduan', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('kategori_id', [''=>'']+App\Kategori::pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Pengaduan']) !!}
		{!! $errors->first('kategori_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }} row">
	{!! Form::label('foto', 'Foto', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		
		{!! Form::file('foto', ['class'=>'form-control col-form-label ']) !!}
		{!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
		@if (isset($pengaduan) && $pengaduan->foto)
		<p>
		{!! Html::image(asset('img/'.$pengaduan->foto), null, ['class'=>'img-rounded img-responsive img-thumbnail
		']) !!}
		</p>
		@endif
	</div>
</div>


<div class="form-group{{ $errors->has('resiko') ? ' has-error' : '' }} row">
	{!! Form::label('resiko', 'Resiko', ['class'=>'col-sm-4 control-label']) !!}
		<div class="col-md-6 offset-sm-4">
			<div class="form-check">
				@if (Request::route()->getName() != 'pengaduan.edit')
				{!! Form::checkbox('keamanan', '1', false,['class'=>'form-check-input']) !!}
				{!! $errors->first('keamanan', '<p class="help-block">:message</p>') !!}
				{!! Form::label('keamanan', 'Keamanan', ['class'=>'form-check-label control-label']) !!}
				
				{!! Form::checkbox('kerugian', '1', false, ['class'=>'form-check-input']) !!}
				{!! $errors->first('kerugian', '<p class="help-block">:message</p>') !!}
				{!! Form::label('kerugian', 'Kerugian', ['class'=>'form-check-label ']) !!}
				@else
					@if($pengaduan->keamanan != 0)
					{!! Form::checkbox('keamanan', '1', true,['class'=>'form-check-input']) !!}
					{!! $errors->first('keamanan', '<p class="help-block">:message</p>') !!}
					{!! Form::label('keamanan', 'Keamanan', ['class'=>'form-check-label control-label']) !!}
					@else
					{!! Form::checkbox('keamanan', '1', false,['class'=>'form-check-input']) !!}
					{!! $errors->first('keamanan', '<p class="help-block">:message</p>') !!}
					{!! Form::label('keamanan', 'Keamanan', ['class'=>'form-check-label control-label']) !!}
					@endif
					
					@if($pengaduan->kerugian != 0)
					{!! Form::checkbox('kerugian', '1', true, ['class'=>'form-check-input']) !!}
					{!! $errors->first('kerugian', '<p class="help-block">:message</p>') !!}
					{!! Form::label('kerugian', 'Kerugian', ['class'=>'form-check-label ']) !!}
					@else
					{!! Form::checkbox('kerugian', '1', false, ['class'=>'form-check-input']) !!}
					{!! $errors->first('kerugian', '<p class="help-block">:message</p>') !!}
					{!! Form::label('kerugian', 'Kerugian', ['class'=>'form-check-label ']) !!}
					@endif
				@endif
				
			</div>
		</div>
</div>
<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }} row">
	{!! Form::label('deskripsi', 'Deskripsi', ['class'=>'col-sm-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::textarea('deskripsi',null, ['class'=>'form-control', 'rows'=>'3']) !!}
		{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group row mb-0">
	<div class="col-md-6 col-md-offset-4">
	{!! Form::submit('Laporkan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>
