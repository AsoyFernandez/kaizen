@forelse ($pengaduan as $log)
    @if ($log->duplikats->count() == 0)
    <tr>
        <td>PE{{ $log->id }}</td>    
        <td>
            {{ $log->users['name'] }}
        </td>
        <td>
            {{ $log->tempats->nama }}
            @if ($log->keamanan == 1)
                <span class="glyphicon glyphicon-fire"></span>
            @endif
            @if ($log->kerugian == 1)
                <span class="glyphicon glyphicon-warning-sign"></span>
            @endif
        </td>
        <td>{{ $log->kategoris->nama }}</td>
        <td><a  data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}">{{ str_limit($log->deskripsi, $limit = 15, '...') }}</a></td>
        
        <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
        
        <td>
        
        <input type="checkbox" id="duplikat" name="duplikat[]" value="{{ $log->id }}">
        
        </td>

        @include('partials.close')
        
        @if(!isset( $log->penanganans ))
        <td>
        @include('pengaduan.action')</td>
        @else
        <td>
            @if (Auth::id() == $log->where('id', $log->id)->first()->user_id)
            <a class="btn btn-info btn-xs disabled" href="">Sedang Di Tangani</a>
            @else
            ga ada
            @endif
    </td>
        @endif
        
    </tr>
        @include('partials.deskripsi_pengaduan', ['object' => $log])
    @endif
@empty
    <tr>
        <td colspan="2">Tidak ada data</td>
    </tr>
@endforelse