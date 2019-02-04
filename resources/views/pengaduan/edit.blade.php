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
				<div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ __('Ubah Pengaduan') }}</h2>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
                </div>
                    <div class="box-body">
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