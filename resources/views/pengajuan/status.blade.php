@if (Request::route()->getName() == 'pengajuan.semua' or Request::route()->getName() == 'pengajuan.index')
	@if ($log->pengajuans->last()->status == null)
		<td>-</td>
	@endif
	@if (!is_null($log->pengajuans->last()->status) && $log->pengajuans->last()->status->status == 0)
		<td>Ditolak</td>
	@endif
	@if (!is_null($log->pengajuans->last()->status) && $log->pengajuans->last()->status->status == 1)
		<td>Diterima</td>
	@endif
	@if (!is_null($log->pengajuans->last()->status) && $log->pengajuans->last()->status->status == 2)
		<td>Ditolak oleh pimpinan</td>
	@endif
	{{-- <td></td> --}}
@endif

@if (Request::route()->getName() == 'pengajuan.show')
	@if ($e->status == null)
		<td>-</td>
	@endif
	@if (!is_null($e->status) && $e->status->status == 0)
		<td>Ditolak</td>
	@endif
	@if (!is_null($e->status) && $e->status->status == 2)
		<td>Ditolak oleh pimpinan</td>
	@endif
	@if (!is_null($e->status) && $e->status->status == 1)
		<td>Diterima</td>
	@endif
@endif