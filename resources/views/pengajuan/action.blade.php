@if (Request::route()->getName() != 'pengajuan.show')
@include('partials.pengawas_tolak', ['object' => $log])
    <td>
    	<a href="{{ route('pengajuan.show', $log->id) }}" class="btn btn-primary btn-xs"><span class=" glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="tooltip" title="Lihat"></span></a>
    	@if (Auth::user()->hasRole([3]))
	    	
     	@endif
     </td>
@include('partials.pengawas_terima', ['object' => $log])
@endif






@if (Request::route()->getName() == 'pengajuan.show')
<td> 
	<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target={{ '#' . $e->id . '-modal' }}><span class=" glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="tooltip" title="Lihat"></span></a>
	@if (Auth::user()->hasRole([3]))
		@if (is_null($e->status))
			@include('partials.pengawas_tolak', ['object' => $e])
			<a data-toggle="modal" data-target="{{ '#' . $e->id . '-modal' }}" class="btn btn-xs btn-danger"><span class="fa fa-times-circle-o" aria-hidden="true" data-toggle="tooltip" title="Tolak"></span></a>
		    <a data-toggle="modal" data-target="{{ '#' . $e->id . 'modal' }}" class="btn btn-xs btn-primary"><span class=" fa fa-check-circle-o" aria-hidden="true" data-toggle="tooltip" title="Terima"></span></a>
			@include('partials.pengawas_terima', ['object' => $e])
		@endif
		

		@if (!is_null($e->status))
		<a data-toggle="modal" data-target="{{ '#' . $e->id . '-modal' }}" class="btn disabled btn-xs btn-danger"><span class="fa fa-times-circle-o" aria-hidden="true" data-toggle="tooltip" title="Tolak"></span></a>
	    <a data-toggle="modal" data-target="{{ '#' . $e->id . 'modal' }}" class="btn disabled btn-xs btn-primary"><span class=" fa fa-check-circle-o" aria-hidden="true" data-toggle="tooltip" title="Terima"></span></a>
		@endif
	@endif
		@include('pengajuan.modalView')
</td>

@endif