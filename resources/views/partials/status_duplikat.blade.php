@if ($log->duplikats->count() == 0)
    <td>Belum Ditinjau</td>
@endif

@if ($log->duplikats->count() != 0)
    
    @foreach ($log->duplikats as $element)
    @if (is_null($element->penanganans))
        <td>Belum Ditangani</td>
    @endif
    @if (!is_null($element->penanganans))
        <td>Sedang Ditangani</td>
    @endif
@endforeach
@endif