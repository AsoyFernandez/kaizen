@extends('vendor.backpack.base.layout')

@section('content')
	<div class="container-fluid spark-screen">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li class="active">Member</li>
				</ul>
				
				<div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title">Member</h2>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                       <p><a class="btn btn-primary" href="{{ route('member.create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Nama Pengguna</th>
                                    <th>HP</th>
                                    <th>Jabatan</th>
                                    <th>Role</th>
                                    <th>Tempat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $log)
                                    <tr>
                                        <td>{{ $log->nik }}</td>
                                        <td>{{ $log->name }}</td>
                                        <td>{{ $log->username }}</td>
                                        @if (is_null($log->hp))
                                        <td>-</td>
                                        @else
                                        <td>{{ $log->hp }}</td>
                                        @endif
                                        <td>{{ $log->jabatan }}</td>
                                        <td>{{ $log->formattedRoles() }}</td>
                                        <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $log->formattedTempats() }}">{{ str_limit($log->formattedTempats(), $limit = 22, $end = '...') }}</a></td>
                                        <td>@include('members.action')</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Nama Pengguna</th>
                                    <th>HP</th>
                                    <th>Jabatan</th>
                                    <th>Role</th>
                                    <th>Tempat</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
