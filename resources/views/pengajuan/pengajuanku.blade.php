@if (Request::route()->getName() == 'pengajuan.index')
	@if (Auth::user()->id == $log->users->id)
	<tr>
	    <td>GA{{ $log->duplikats->id }}</td>
	    <td>{{ $log->duplikats->tempats->nama }}</td>
	    <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
	    <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $log->duplikats->deskripsi }}">{{ str_limit($log->duplikats->deskripsi, $limit = 20, $end = '...') }}</a></td>
	    <td>{{ $log->duplikats->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
	    @include('pengajuan.status')
	    <td>@include('pengajuan.view') 
	    </td> 
	</tr>
	@endif
@endif