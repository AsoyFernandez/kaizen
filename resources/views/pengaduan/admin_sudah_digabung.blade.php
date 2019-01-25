@forelse ($duplikats as $log)
                           <tr>
                               <td>{{ $log->pengaduans->first()->users->name }} <a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal' }}""><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></a></td>
                               @include('partials.pengaduan_users', ['object' => $log])

                               <td>{{ $log->pengaduans->first()->tempats->nama }}</td>
                                
                               <td>{{ $log->deskripsi }}</td>
                               @if (!isset($log->penanganans))
                               <td><a class="btn btn-primary btn-xs" href="{{ route('pengaduan.tangani', $log->id) }}">Tangani</a></td>
                               @else
                               <td><a data-toggle="modal" data-target="{{ '#' . $log->id . 'modal-petugas' }}" class="btn btn-primary btn-xs">Ditangani</a></td>
                               @include('partials.modal_petugas', ['object' => $log])
                               @endif
                           </tr> 
                           @empty
                            <tr>
                                <td colspan="2">Tidak ada data</td>
                            </tr>
                        @endforelse