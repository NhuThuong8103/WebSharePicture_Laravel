@if(Auth::check()&& Auth::user()->phephoatdong)
<div class="col-lg-3 col-md-3 d-none d-md-block">
	<div class="name-user">
		<a href="{{ route('usereditprofile') }}" title="Trang ca nhan">
			<span class="icon-user">
				{{ Auth::user()->ho}}&nbsp;{{ Auth::user()->ten }}
			</span>
			<div class="avatar">
				<img src="" class="boder-icon">
			</div>
		</a>
	</div>
</div>
<div class="col-lg-1 col-md-1 d-none d-md-block">
	<div class="logout-acount">
		<a href="{{ url('/logout')}}" title="Logout">
			<span class="link-log">Logout</span>
		</a>
	</div>
</div>
<script src="{{ URL::asset('js/ajax_get_avatar.js') }}"></script>
@else
<div class="col-lg-3 col-md-3 d-none d-md-block">
		<!-- <div class="name-user">
			<a href="google.com" title="Trang ca nhan">
				<span class="icon-user">
					Nhu Thuong
				</span>
				<img src="image/icon-user.jpg" class="boder-icon">
			</a>
		</div> -->
	</div>
	<div class="col-lg-1 col-md-1 d-none d-md-block">
		<div class="logout-acount">
			<a href="{{ url('/login')}}" title="Login" onclick="location.reload(true);" >
				<span class="link-log">Login</span>
			</a>
		</div>
	</div>
	@endif