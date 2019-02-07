@if (Request::route()->getName() == 'semua.pengajuan')
    @foreach (Auth::user()->tempats as $e)
        @foreach ($e->child as $el)
            @foreach (Auth::user()->roles as $ele)
                @if ($ele->id == 3)
                
                    @if ($log->duplikats->lokasi_id == $el->id)
                        
                    <tr>
                        <td></td>
                        <td>{{ $log->users->name }}</td>
                        <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                        <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                        <td>{{ $log->deskripsi }}</td>

                        <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>

                        @if (isset($log->status) && $log->status->status == 0)
                            <td><a class="btn btn-primary disabled">Ditolak</a></td>
                        @endif

                        @if (isset($log->status) && $log->status->status == 1)
                            <td><a class="btn btn-primary disabled">Diterima</a></td>
                            
                        @endif

                        @if (!isset($log->status))

                        @include('partials.pengawas_tolak', ['object' => $log])
                            <td><a data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}" class="btn btn-xs btn-primary">Tolak</a>
                         <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}" class="btn btn-xs btn-primary">Terima</a></td>
                         
                    @include('partials.pengawas_terima', ['object' => $log])
                        @endif
                    </tr>
                    @endif
                @endif
            @endforeach
        @endforeach
    @endforeach
@endif