@extends('vendor.backpack.base.layout')

@section('content')
	<div class="container-fluid spark-screen">
		<div class="row justify-content-center">
			<div class="col-md-8 col-md-offset-2">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li><a href="{{ route('pengaduan.index') }}">Pengaduan</a></li>
					<li class="active">Ubah Pengaduan</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Ubah Pengaduan</h2>
					</div>

				<div class="panel-body">
					{!! Form::model($pengaduan, ['url' => route('pengaduan.update', $pengaduan->id),
						'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
					@include('pengaduan._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('after_scripts')
	<script defer type="text/javascript">
		$(document).ready(function () {
			let $select = $('.js-selectize-edit').selectize({
				sortField: 'text',
				maxItems: 2,
				options: [
				       {email: 'brian@thirdroute.com'},
				       {email: 'nikola@tesla.com'},
				       {email: 'someone@gmail.com'}
				   ],
			});
		});
	</script>
@endpush