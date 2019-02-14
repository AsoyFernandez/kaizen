{!! Form::open(['url' => route('pengaduan.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <a class="btn btn-primary btn-xs" href="{{ route('pengaduan.edit', $log->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit"></span></a>
    <button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span></button>
    @foreach ($log->duplikats as $el)
    	@if ($el->nilai_id != null)
    		<a class="btn btn-primary btn-xs" href="{{ route('pengaduan.unduh', $log->id) }}"><span class=" glyphicon glyphicon-save" aria-hidden="true" data-toggle="tooltip" title="Unduh Laporan"></span></a>
    	@endif
    @endforeach
    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target={{ '#' . $log->id . '-modal' }}><span class=" glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="tooltip" title="Lihat"></span></a>

	<!-- Modal -->
	<div id="{{ $log->id . '-modal' }}" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Detail Pengaduan</h4>
	      </div>
	      <div class="modal-body">
	      	<center>  
             @if (isset($log) && $log->foto)
                <img class="img-rounded img-responsive " style="width: 30rem; height: 30rem" src="{!!asset('img/'.$log->foto)!!}">
              @else
                 Foto belum di upload
              @endif
            <div class="row">
                Kategori : {{ $log->kategoris->nama }}
            </div>
            <div class="row">
                {{ $log->deskripsi }}
            </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
 
{!! Form::close() !!}
