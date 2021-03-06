	<header>
		<div class="container">
			<div class="row p-1">
				<div class="col-lg-2 col-md-3 col-sm-4 col-4">
					<div class="logo-head">
						<a href="{{ url('/') }}">
							<span class="title-header">Fotobook</span>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-5 col-6 pl-0">
					<form>
						<div class="form-group">
							<input type="text" class="form-control input-search" id="search-foto" placeholder="Search Photo / Album">
						</div>
					</form>
				</div>

				@include('user_auth')
				
				<div class="col-2 d-md-none">
					<a href="#" title="Menu quản lý">
						<span class="navTrigger">
							<i></i>
							<i></i>
							<i></i>
						</span>
					</a>

				</div>
				<div id="menu-mobile" class="menu-lists d-md-none">
					@include('user.navmobile')
					</div>
				</div>
			</div>
			<div class="backdrop"></div>
		</header>
