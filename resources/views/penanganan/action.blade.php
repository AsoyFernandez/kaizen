{!! Form::open(['url' => route('penanganan.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    @if(App\Pengajuan::where('penanganan_id',$log->id)->first() == null)
        <td>Belum ada</td>
        <td>
            <a class="btn btn-primary btn-xs glyphicon glyphicon-hand-up" href="{{ route('penanganan.post_id', $log->id) }}" data-toggle="tooltip" title="Ajukan"></a> 
            <a class="btn btn-primary btn-xs" href="{{ route('penanganan.edit', $log->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit"></span></a>
    		<button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span></button>
        </td>
    @endif

    @if(App\Pengajuan::where('penanganan_id',$log->id)->first() != null && !isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status))
        <td>
            <a class="btn btn-primary disabled btn-xs glyphicon glyphicon-hand-up" data-toggle="tooltip" title="Ajukan"></a>
            <a class="btn btn-primary btn-xs" href="{{ route('penanganan.edit', $log->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit"></span></a>
    		<button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span></button>
        </td> 
    @endif

    @if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 0)
        <td>
        	<a class="btn btn-primary btn-xs glyphicon glyphicon-hand-up" href="{{ route('penanganan.post_id', $log->id) }}" data-toggle="tooltip" title="Ajukan"></a>	
            <a class="btn btn-primary btn-xs" href="{{ route('penanganan.edit', $log->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit"></span></a>
    		<button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span></button>
        </td>
    @endif
    
    @if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 1)
        <td>
        	<a class="btn btn-primary disabled btn-xs glyphicon glyphicon-hand-up" data-toggle="tooltip" title="Ajukan"></a>
            <a class="btn btn-primary btn-xs" href="{{ route('penanganan.edit', $log->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit"></span></a>
    		<button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span></button>
        </td>
    @endif
{!! Form::close() !!}
