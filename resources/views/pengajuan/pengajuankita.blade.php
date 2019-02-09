@if (Request::route()->getName() == 'semua.pengajuan')
    @foreach (Auth::user()->tempats as $e)
        @foreach ($e->child as $el)
            @foreach (Auth::user()->roles as $role)
            {{-- Admin --}}
            @if ($role->id == 3)
                
                    @if ($log->duplikats->lokasi_id == $el->id)
                        
                    <tr>
                        <td>GA{{ $log->duplikats->id }} <a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->duplikats->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                        @include('pengajuan.seluruhPengaduan', ['object' => $log])</td>
                        <td>{{ $log->users->name }}</td>
                        <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                        <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                        <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $log->duplikats->deskripsi }}">{{ $log->duplikats->deskripsi }}</a></td>

                        <td>{{ $log->duplikats->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
                        @include('pengajuan.status')

                        @if (!isset($log->status))

                        @include('pengajuan.action')
                        @endif
                    </tr>
                    @endif
                @endif
            {{-- Pengawas --}}
            @endforeach
        @endforeach
    @endforeach

    @foreach (Auth::user()->roles as $role)
        @if ($role->id == 1)
            <tr>
                <td>GA{{ $log->duplikats->id }} <a href="#myModal" id="openBtn" data-toggle="modal" data-target="{{ '#' . $log->duplikats->id . 'modal' }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                        @include('pengajuan.seluruhPengaduan', ['object' => $log])</td>
                <td>{{ $log->users->name }}</td>
                <td>{{ $log->duplikats->pengaduans->first()->tempats->nama }}</td>
                <td>{{ $log->duplikats->pengaduans->first()->kategoris->nama }}</td>
                <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $log->duplikats->deskripsi }}">{{ $log->duplikats->deskripsi }}</a></td>

                <td>{{ $log->duplikats->pengaduans->first()->created_at->format('d/m/Y H:i') }}</td>
                
                @include('pengajuan.status')

                <td>@include('pengajuan.view') </td> 
            </tr>
        @endif
    @endforeach
@endif