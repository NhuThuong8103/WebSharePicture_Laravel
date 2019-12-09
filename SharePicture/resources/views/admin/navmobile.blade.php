<ul>
	<li>Hi, {{ Auth::user()->ho}}&nbsp;{{ Auth::user()->ten }} <3 </li>
		<li><a href="{{ url('/admin/') }}">Manage Photos</a></li>
		<li><a href="{{ url('/admin/managerAlbums') }}">Manage Albums</a></li>
		<li><a href="{{ url('/admin/managerUsers') }}">Manage Users</a></li>
		<li><a href="{{ url('/logout')}}">Sign Out</a></li>
	</ul>