@if(Auth::check()&& Auth::user()->phephoatdong)
<ul>
	<li>Hi, {{ Auth::user()->ho}}&nbsp;{{ Auth::user()->ten }} <3 </li>
		<li><a href="{{ url('/') }}">Feeds</a> </li>
		<li><a href="{{url('/myphotos')}}">My Photo</a></li>
		<li><a href="{{url('/myalbums')}}">My Album</a></li>
		<li><a href="{{ url('/logout')}}">Sign Out</a></li>
	</ul>
@else
<ul>
	<li>Hello <3 </li>
	<li><a href="{{ url('/') }}">Feeds</a> </li>
	<li><a href="{{url('/myphotos')}}">My Photo</a></li>
	<li><a href="{{url('/myalbums')}}">My Album</a></li>
	<li><a href="{{ url('/login')}}">Sign Out</a></li>
</ul>
@endif