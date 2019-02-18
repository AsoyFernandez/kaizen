<div class="box">
    <div class="box-body box-profile">
	    <img class="profile-user-img img-responsive img-circle" src="{{ backpack_avatar_url(backpack_auth()->user()) }}">
	    <h3 class="profile-username text-center">{{ backpack_auth()->user()->name }}</h3>
	</div>

	<ul class="nav nav-pills nav-stacked">

	  <li role="presentation"
		@if (Request::route()->getName() == 'backpack.account.info')
	  	class="active"
	  	@endif
	  	><a href="{{ route('backpack.account.info') }}">{{ trans('Update Akun') }}</a></li>

	  <li role="presentation"
		@if (Request::route()->getName() == 'backpack.account.password')
	  	class="active"
	  	@endif
	  	><a href="{{ route('backpack.account.password') }}">{{ trans('Ganti Password') }}</a></li>

	</ul>
</div>
