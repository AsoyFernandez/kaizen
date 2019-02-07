<!-- Modal -->
	<div id="{{ $e->id . '-modal' }}" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Detail Pengajuan</h4>
	      </div>
	      <div class="modal-body scrollable">
	      	<center>  
             @if (isset($e) && $e->foto)
                <img class="img-rounded " style="width: 30rem; height: 30rem" src="{!!asset('img/'.$e->foto)!!}">
              @else
                 Foto belum di upload
              @endif
        </center>
        <div class="table">
              <table class="table table-responsive table-bordered" border="3">
              	<tbody>
              		<tr>
              			<th>Deskripsi</th>
              			<td>{{ $e->deskripsi }}</td>
              		</tr>
              		<tr>
              			<th>Tanggal Input</th>
              			<td>{{ $e->created_at }}</td>
              		</tr>
              		<tr>
              			<th>Status</th>
              			<td>Belum Ada</td>
              		</tr>
              		<tr>
              			<th>Tanggal Konfirmasi</th>
              			<td>-</td>
              		</tr>
              		<tr>
              			<th>Detail</th>
              			<td>-</td>
              		</tr>
              	</tbody>
              </table>
              </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>