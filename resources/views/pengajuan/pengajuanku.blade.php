@if (Request::route()->getName() == 'pengajuan.index')
	@if (Auth::user()->id == $log->users->id)
	<tr>
	    <td>GA{{ $log->duplikats->id }}</td>
	    <td>{{ $log->duplikats->tempats->nama }}</td>
	    <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
	    <td>{{ $log->duplikats->deskripsi }}</td>
	    <td>{{ $log->duplikats->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
	    <td>@include('pengajuan.view')
	    </td>
	</tr>
	@endif
@endif