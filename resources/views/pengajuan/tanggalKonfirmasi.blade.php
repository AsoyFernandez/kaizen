@if (Request::route()->getName() != 'semua.pengajuan')
	@if ($e->status == null)
		<td>-</td>
	@endif
	@if (!is_null($e->status))
		<td>{{ $e->status->created_at->format('d/m/Y H:i') }}</td>
	@endif
@endif