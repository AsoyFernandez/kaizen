<a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->pengajuans->penanganans->duplikats->id . 'modal' }}" class="btn btn-primary btn-xs"><span class=" glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="tooltip" title="Lihat"></span></a> 

@if (App\Penilaian::where('status_id',$log->id)->first() != null)
    <a data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit Nilai"></span></a> 
    <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modale' }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true" data-toggle="tooltip" title="Buka Kembali"></span></a>
    @include('partials.pimpinan_lihatnilai', ['object' => $log])

    @else
<a data-toggle="modal" data-target="{{ '#' . $log->id . 'modals' }}" class="btn btn-xs btn-primary"><span class="	glyphicon glyphicon-ok" aria-hidden="true" data-toggle="tooltip" title="Beri Nilai"></span></a> <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modale' }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true" data-toggle="tooltip" title="Buka Kembali"></span></a>
@include('partials.pimpinan_nilai', ['object' => $log])

@endif