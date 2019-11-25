<header>
	<div class="container">
		<div class="row p-1">
			<div class="col-lg-2 col-md-3 col-sm-4 col-4">
				<div class="logo-head">
					<span class="title-header">Fotobook Admin</span>
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
					<!-- <h6 style="font-size: 16px;margin-top: 2%;float: right;">menu</h6> -->
					<span class="navTrigger">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</a>

			</div>
			<div id="menu-mobile" class="menu-lists d-md-none">
				<ul>
					<li>Hi, Nhu Thuong <3 </li>
						<li>Manage Photos </li>
						<li>Manage Albums</li>
						<li>Manage Users</li>
						<li>Sign In</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="backdrop"></div>
	</header>