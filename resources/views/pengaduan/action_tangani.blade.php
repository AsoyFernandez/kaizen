@foreach (Auth::user()->roles as $key)
	@if ($key->id == 3 or $key->id == 4)
		@if (Request::route()->getName() == 'pengaduan.index')
			@if (!isset($log->penanganans))
		     <td><a class="btn btn-primary btn-xs" href="{{ route('pengaduan.tangani', $log->id) }}">Tangani</a></td>
		     @else
		     <td><a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal-petugas' }}" class="btn btn-primary disabled btn-xs">Tangani</a></td>
		     @include('partials.modal_petugas', ['object' => $log])
		     @endif
		@endif
	@endif
@endforeach