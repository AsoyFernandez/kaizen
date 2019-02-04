@if(App\Pengajuan::where('penanganan_id',$log->id)->first() == null )
    <td>Belum ada
    </td> 
@endif
@if(App\Pengajuan::where('penanganan_id',$log->id)->first() != null && !isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status))
    <td>Menunggu konfirmasi
    </td> 
@endif


@if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 0)
    <td>Ditolak</td>
@endif


@if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 1 && is_null(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->orderBy('created_at', 'desc')->first()->penilaian))
    <td>Diterima</td>
@endif

@if(isset(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status) && App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->status == 1 && !is_null(App\Pengajuan::where('penanganan_id',$log->id)->orderBy('created_at', 'desc')->first()->status->orderBy('created_at', 'desc')->first()->penilaian))
    <td>Dinilai</td>
@endif