@forelse ($duplikats as $log)
   <tr>
      <td>
        GA{{ $log->id }} <a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
        @include('partials.pengaduan_users', ['object' => $log]) 
      </td>

    <td>{{ $log->pengaduans->first()->users->name }} 
      </td>
       <td>
        {{ $log->pengaduans->first()->tempats->nama }} 
        @include('partials.simbol_gabungan')
       </td>
        <td>{{ $log->pengaduans->first()->kategoris->nama }}</td>
       <td>
        <a  data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}">{{ str_limit($log->deskripsi, $limit = 15, '...') }}</a>

        @include('partials.deskripsi_duplikat', ['object' => $log])
       </td>
       <td>{{ $log->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>

          @if (is_null($log->penanganans))
              <td>Belum Ditangani</td>
          @endif
          @if (!is_null($log->penanganans))
              <td>Sedang Ditangani</td>
          @endif
        

       @if (!isset($log->penanganans))
       <td><a class="btn btn-primary btn-xs" href="{{ route('pengaduan.tangani', $log->id) }}">Tangani</a></td>
       @else
       <td><a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal-petugas' }}" class="btn btn-primary disabled btn-xs">Tangani</a></td>
       @include('partials.modal_petugas', ['object' => $log])
       @endif
   </tr> 
   @empty
    <tr>
        <td colspan="2">Tidak ada data</td>
    </tr>
@endforelse