<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
        <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
@php
    $user = Auth::user()->roles;
@endphp
@foreach ($user as $role)
    @if ($role->id == 1)
        <li class="treeview">
            <a href="#"><i class='fa fa-institution'></i> <span>{{ trans('Perusahaan') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('perusahaan.index') }}"><i class='fa fa-institution'></i>{{ trans('Data Alamat') }}</a></li>
                <li><a href="{{ route('area.index') }}"><i class="fa fa-map"></i>{{ trans('Data Area') }}</a></li>
                <li><a href="{{ route('lokasi.index') }}"><i class="fa fa-map-o"></i>{{ trans('Data Lokasi') }}</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#"><i class='fa fa-child'></i> <span>{{ trans('Anggota') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('member.index') }}"><i class='fa fa-group'></i> <span>{{ trans('Anggota') }}</span></a></li>
                
            </ul>
        </li> 
    @endif
@endforeach

@php
        $user = Auth::user()->roles;
        $tempat = Auth::user()->tempats;
        $hitung = 0;
        foreach ($user as $key) {
            if ($key->id == 1) {
                # code...
                foreach (App\Pengaduan::all() as $pengaduan) {
                    if ($pengaduan->duplikats->count() == 0) {
                        $hitung ++;
                    }
                }
            }elseif ($key->id == 3) {
                foreach ($tempat as $key) {
                     foreach ($key->child as $log) {
                         foreach (App\Pengaduan::all() as $pengaduan) {
                            if ($pengaduan->lokasi_id == $log->id && $pengaduan->duplikats->count() == 0) {
                                $hitung ++;
                            }
                        }
                    }
                 }
            } 
        }
@endphp

@php
    $jumlah = App\Duplikat::duplikatTanpaPenanganan()->count();
@endphp

<li class="treeview">
    <a href="#"><i class='fa fa-comment-o'></i> <span>{{ trans('Pengaduan') }}<span class="badge">@if ($hitung != 0)
        {{ $hitung }}
    @endif</span></span>  <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ route('pengaduan.pengaduanku') }}"><i class='fa fa-plus-circle'></i> <span>{{ trans('Buat') }}</span></a></li>
        @php
            $user = Auth::user()->roles;
        @endphp
        @foreach ($user as $role)
        @if ($role->id == 1 || $role->id == 3)
        
        <li><a href="{{ route('pengaduan.semua_pengaduan') }}"><i class='fa fa-newspaper-o'></i> <span>{{ trans('Pengaduan') }}</span></a></li>

        <li><a href="{{ route('pengaduan.index') }}"><i class='fa fa-clone'></i> <span>{{ trans('Gabungkan') }}</span><span class="badge">{{ $hitung }}</span></a></li>
        
        @endif
        @if ($role->id == 4)
            <li><a href="{{ route('pengaduan.semua_pengaduan') }}"><i class='fa fa-newspaper-o'></i> <span>{{ trans('Pengaduan') }}</span>
            @if ($jumlah != 0)
                <span class="badge"> {{ $jumlah }}</span>
            @endif
            </a></li>
        @endif
        @endforeach

    </ul>
</li>

@foreach (Auth::user()->roles as $penanganan)
    @if ($penanganan->id == 3 or $penanganan->id == 4 or $penanganan->id == 1)
    <li class="treeview">  
        <a href="#"><i class='fa fa-sign-language'></i> <span>{{ trans('Penanganan') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            @if ($penanganan->id == 3 or $penanganan->id == 4)
            <li><a href="{{ route('penanganan.index') }}"><i class='fa fa-cube'></i> <span>{{ trans('Penanganan Ku') }}</span></a></li>
            @endif
            @if ($penanganan->id == 3 or $penanganan->id == 1)
                <li><a href="{{ route('semua.penanganan') }}"><i class='fa fa-cubes'></i> <span>{{ trans('Semua Penanganan') }}</span></a></li>
            @endif
            </ul>
        </a>
    </li>
    @endif
@endforeach


<li class="treeview">  
    <a href="#"><i class='fa fa-envelope'></i> <span>{{ trans('Pengajuan') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
@foreach (Auth::user()->roles as $pengajuan)
            @if ($pengajuan->id == 4 or $pengajuan->id == 3)
                <li><a href="{{ route('pengajuan.index') }}"><i class='fa fa-recycle'></i> <span>{{ trans('Pengajuan Ku') }}</span></a>
                </li>
            @endif
            @if ($pengajuan->id == 1 or $pengajuan->id == 3)
                <li><a href="{{ route('semua.pengajuan') }}"><i class='fa fa-object-group'></i> <span>{{ trans('Semua Pengajuan') }}</span></a>
                </li>
            @endif
@endforeach
        </ul>
    </a>
</li>

<li class="treeview">  
    <a href="#"><i class='fa fa-thumbs-o-up'></i> <span>{{ trans('Penilaian') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
        <li><a href="{{ route('penilaian.index') }}"><i class='fa fa-thumbs-o-up'></i> <span>{{ trans('Penilaian') }}</span></a></li>    
        </ul>
    </a>
</li>