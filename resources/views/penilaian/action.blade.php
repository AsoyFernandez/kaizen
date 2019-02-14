@if (App\Penilaian::where('status_id',$log->id)->first() != null)
    <td><a data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit Nilai"></span></a></td>
    @include('partials.pimpinan_lihatnilai', ['object' => $log])

    @else
<td><a href="{{ route('penilaian.show', $log->id) }}" class="btn btn-primary btn-xs"><span class=" glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="tooltip" title="Lihat"></span></a> <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}" class="btn btn-xs btn-primary"><span class="	glyphicon glyphicon-ok" aria-hidden="true" data-toggle="tooltip" title="Beri Nilai"></span></a> <a href="" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-remove" aria-hidden="true" data-toggle="tooltip" title="Buka Kembali"></span></a></td>

@endif
@include('partials.pimpinan_nilai', ['object' => $log])