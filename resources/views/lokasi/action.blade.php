{!! Form::open(['url' => route('lokasi.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <a class="btn btn-primary btn-xs" href="{{ route('lokasi.edit', $log->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit"></span></a> <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}"><span class=" glyphicon glyphicon-circle-arrow-down" aria-hidden="true" data-toggle="tooltip" title="Generate QR Code"></span></a>
    <button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span> </button>
{!! Form::close() !!}