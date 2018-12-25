@forelse($pengaduan as $key)
                                    @if($key->duplikats->count() < 1)
                                
                                        <td>{{ $key->users->name }}</td>
                                        <td>{{ $key->tempats->nama }}</td>
                                        <td>{{ $key->kategoris->nama }}</td>
                                        @if (isset($key) && $key->foto)
                                                <td><img class="img-rounded img-responsive" style="width: 5rem; height: 5rem" src="{!!asset('img/'.$key->foto)!!}"></td>
                                            @else
                                            <td>Foto belum di upload</td>
                                            @endif
                                         <td>{{ $key->deskripsi }}</td>
                                    @else
                                    @endif
                                @empty
                                    Kosong
                                @endforelse
                                