{!! Form::open(['url' => route('member.destroy', $log->id), 'method' => 'delete',  'class'=>'delete form-inline']) !!}
    <a class="btn btn-primary btn-xs" href="{{ route('member.edit', $log->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" title="Edit"></span></a>
    <button type="submit" class="btn btn-warning btn-link btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" title="Hapus"></span> </button>
{!! Form::close() !!}