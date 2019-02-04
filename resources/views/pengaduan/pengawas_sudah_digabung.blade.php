@forelse ($duplikats as $log)

@if ($log->pengaduans->first()->lokasi_id == $el->id)
   <tr>
     <td> 
        GA{{ $log->id }} <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}""><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
             @include('partials.pengaduan_users', ['object' => $log])
     </td>
     <td>{{ $log->pengaduans->first()->users->name }}</td>

     <td>{{ $log->pengaduans->first()->tempats->nama }}</td>

     <td>{{ $log->pengaduans->first()->kategoris->nama }}</td>

     <td>{{ $log->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
      
     <td>
        <a  data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}">{{ str_limit($log->deskripsi, $limit = 15, '...') }}</a>

        @include('partials.deskripsi_duplikat', ['object' => $log])
       </td>

        @if (is_null($log->penanganans))
              <td>Belum Ditangani</td>
        @endif
        @if (!is_null($log->penanganans))
              <td>Sedang Ditangani</td>
        @endif


      @include('pengaduan.action_tangani')
   </tr> 
  @endif
   @empty
    <tr>
        <td colspan="2">Tidak ada data</td>
    </tr>
@endforelse