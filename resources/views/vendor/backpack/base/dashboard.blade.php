@extends('backpack::layout')

@section('header')
    <section class="content-header">
      {{-- <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1> --}}
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
@php
  $tempat = Auth::user()->tempats;
        $hitung = 0;
            if (Auth::user()->hasRole([1])) {
                foreach (App\Pengaduan::all() as $pengaduan) {
                    if($pengaduan->duplikats == null){
                        $hitung ++;
                    }
                }
            }elseif (Auth::user()->hasRole([3])) {
                foreach ($tempat as $key) {
                     foreach ($key->child as $log) {
                         foreach (App\Pengaduan::all() as $pengaduan) {
                            if ($pengaduan->lokasi_id == $log->id && $pengaduan->duplikats == null) {
                                $hitung ++;
                            }
                        }
                    }
                 }
              } 
@endphp

@php
    // $jumlah = 0;
    // $tempat = Auth::user()->areas()->pluck('id')->all();
    // if (Auth::user()->hasRole([3])) {
    //   foreach (App\Pengaduan::all() as $pengaduan) {
    //     if (in_array($pengaduan->lokasi_id, $tempat)) {
    //       $jumlah += 1;
    //     }
    //   }
    // }
$tempat = Auth::user()->tempats;
        $jumlah = 0;
            if (Auth::user()->hasRole([3])) {
                foreach ($tempat as $key) {
                     foreach ($key->child as $log) {
                         foreach (App\Duplikat::all() as $duplikat) {
                            if ($duplikat->lokasi_id == $log->id && $duplikat->penanganans == null) {
                              $jumlah++;
                            }
                        }
                    }
                 }
              } 
@endphp
@php
  $tempat = Auth::user()->tempats;
        $konfirm = 0;
            if (Auth::user()->hasRole([3])) {
                foreach ($tempat as $key) {
                     foreach ($key->child as $log) {
                         foreach (App\Duplikat::all() as $duplikat) {
                            if ($duplikat->lokasi_id == $log->id) {
                              foreach (App\Pengajuan::all() as $key) {
                                if ($key->status == null) {
                                  # code...
                                  $konfirm++;
                                }
                                
                              }
                            }
                        }
                    }
                 }
              } 
@endphp

    <div class="row">
        @if (Auth::user()->hasRole([1,2,3]))

        <div class="col-md-4">
            <div class="box" style="height: 150px !important">
                <div class="box-header with-border">
                    <div class="box-title"><span>{{ trans('Pengaduan Baru') }}</span></div>
                </div>
                <div class="box-body" style="padding-top: 30px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <i class='fa fa-comment-o' style="font-size: 45px"></i>
                        </div>
                        <div class="col-md-9">
                          <strong>{{ $hitung }}</strong>
                          <p>Pengaduan baru yang belum dikelompokkan</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-md-4">
            <div class="box" style="height: 150px !important">
                <div class="box-header with-border">
                    <div class="box-title"><span>{{ trans('Belum Ditangani') }}</span></div>
                </div>
                <div class="box-body" style="padding-top: 30px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <i class='fa fa-commenting-o' style="font-size: 45px"></i>
                        </div>
                        <div class="col-md-9">
                          @if (Auth::user()->hasRole([4]))
                            {{-- expr --}}
                          <strong>{{ App\Duplikat::duplikatTanpaPenanganan()->count()   }}</strong>
                          @endif
                          @if (Auth::user()->hasRole([1,2]))
                          <strong>{{ App\Duplikat::semuaDuplikatTanpaPenanganan()->count() }}</strong>
                          @endif
                          <p>Pengaduan yang belum ditangani</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@if (Auth::user()->hasRole([4]))
<div class="col-md-4">
            <div class="box" style="height: 150px !important">
                <div class="box-header with-border">
                    <div class="box-title"><span>{{ trans('Sedang Ditangani') }}</span></div>
                </div>
                <div class="box-body" style="padding-top: 30px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <i class='fa fa-commenting-o' style="font-size: 45px"></i>
                        </div>
                        <div class="col-md-9">
                          <strong>{{ App\Duplikat::duplikatTanpaPenilaian()->count() }}</strong>
                          <p>Pengaduan yang sedang ditangani</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box" style="height: 150px !important">
                <div class="box-header with-border">
                    <div class="box-title"><span>{{ trans('Selesai') }}</span></div>
                </div>
                <div class="box-body" style="padding-top: 30px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <i class='fa fa-commenting-o' style="font-size: 45px"></i>
                        </div>
                        <div class="col-md-9">
                          <strong>{{ App\Duplikat::duplikatDenganPenilaian()->count() }}</strong>
                          <p>Pengaduan yang sudah selesai</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endif
@if (Auth::user()->hasRole([1,2,3]))

        <div class="col-md-4">
            <div class="box" style="height: 150px !important">
                <div class="box-header with-border">
                    <div class="box-title"><span>{{ trans('Belum Dikonfirmasi') }}</span></div>
                </div>
                <div class="box-body" style="padding-top: 30px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <i class='fa fa-check' style="font-size: 45px"></i>
                        </div>
                        <div class="col-md-9">
                          <strong>{{ App\Pengajuan::semuaPengajuanTanpaStatus()->count() }}</strong>
                          <p>Pengajuan yang belum dikonfirmasi</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endif
@if (Auth::user()->hasRole([1,2,3]))
        <div class="col-md-4">
            <div class="box" style="height: 150px !important">
                <div class="box-header with-border">
                    <div class="box-title"><span>{{ trans('Menunggu Penilaian') }}</span></div>
                </div>
                <div class="box-body" style="padding-top: 30px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <i class='fa fa-star-o' style="font-size: 45px"></i>
                        </div>
                        <div class="col-md-9">
                          <strong>{{ App\Status::semuaStatusTanpaPenilaian()->count() }}</strong>
                          <p>Kelompok pengaduan yang belum dinilai</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endif
@if (Auth::user()->hasRole([1,2,3]))
        <div class="col-md-4">
            <div class="box" style="height: 150px !important">
                <div class="box-header with-border">
                    <div class="box-title"><span>{{ trans('Sudah Dinilai') }}</span></div>
                </div>
                <div class="box-body" style="padding-top: 30px">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-3 text-center">
                          <i class='fa fa-star-half-full' style="font-size: 45px"></i>
                        </div>
                        <div class="col-md-9">
                          <strong>{{ App\Penilaian::all()->count() }}</strong>
                          <p>Kelompok pengaduan yang sudah dinilai</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endif
@endsection
