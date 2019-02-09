                                       	{{-- expr --}}
{!! Form::open(['url' => route('pengaduan.gabungkan'), 'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal', 'id' => 'gabungkan']) !!}
<a class="btn btn-primary" href="{{ route('pengaduan.create') }}"><i class='fa fa-plus-circle'></i> Tambah</a>
@php
  $user = Auth::user()->roles;
@endphp
@foreach ($user as $key)

@if (Auth::user()->roles->first()->id == 1 || $key->id == 3)
 <!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-primary"><i class='glyphicon glyphicon-compressed'></i> Gabungkan</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
  	<input type="hidden" name="duplikat_id" id="duplikat_id">
    <li><a class="btn btn-primary" onclick="submitBaru()">Baru</a></li>
    <li><a class="btn btn-primary" onclick="submitSudahAda()">Sudah Ada</a></li>
  </ul>
</div> 
@endif 

@endforeach

@section('after_scripts')
<script>
	var form = $('#gabungkan');

	function submitBaru() {
		form.submit();
	}

	function submitSudahAda() {
		form.prepend('<input type="hidden" name="sudah_ada" value="1">');
		form.submit();
	}
</script>
@endsection