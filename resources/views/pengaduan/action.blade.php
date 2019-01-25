{!! Form::open(['url' => route('pengaduan.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <a class="btn btn-primary btn-xs" href="{{ route('pengaduan.edit', $log->id) }}">Ubah</a> 
    {{ Form::submit('Hapus', array('class' => 'btn btn-xs btn-warning')) }}
    
    <a href="#" class="btn btn-info btn-xs glyphicon glyphicon-eye-open" data-toggle="modal" data-target={{ '#' . $log->id . '-modal' }}></a>

	<!-- Modal -->
	<div id="{{ $log->id . '-modal' }}" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Status</h4>
	      </div>
	      <div class="modal-body">
	      	@foreach ($log->duplikats as $element)
                            
	            @if (isset($element) && isset($element->penanganans))
	                <center>Status : Ditangani</center>
	            @endif
	            @if (isset($element) && !isset($element->penanganans))
	                <center>Status : Belum Ditangani</center>
	            @endif
	        @endforeach

	            @if ($log->duplikats == '[]')
	                <center>Belum Ditinjau</center>
	            @endif
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
 
{!! Form::close() !!}