
@if(App\Pengajuan::where('penanganan_id',$log->id)->first() == null )
    <td>Belum ada</td>
@endif
@if(App\Pengajuan::where('penanganan_id',$log->id)->first() != null && !isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status))
    <td>Menunggu konfirmasi
    </td> 
@endif


@if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 0)
    <td>Ditolak</td>
@endif

@if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 2)
    <td>Ditolak oleh pimpinan</td>
@endif


@if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 1 && is_null(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->orderBy('created_at', 'desc')->first()->penilaian))
    <td>Diterima</td>
@endif

@if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 1 && !is_null(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->orderBy('created_at', 'desc')->first()->penilaian))
    <td>Dinilai</td>
@endif

@foreach (Auth::user()->roles as $e)
	@if ($e->id == 1)
		{!! Form::open(['url' => route('penanganan.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <td>
    		<button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span></button>
        </td>
{!! Form::close() !!}
	@endif
@endforeach