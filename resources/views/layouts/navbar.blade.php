<header id="header" class="fixed-top">
	<div class="container d-flex">
		<div class="logo mr-auto">
			<h1 class="text-light"><a href="{{ url('/') }}">Redbird E-Sports</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
		</div>
		<nav class="nav-menu d-none d-lg-block">
			@if(Auth::guest() == true)
			<ul>
				<li><a href="#hero">Home</a></li>
				<li><a href="#about">About Us</a></li>
				<li><a href="#team">Team</a></li>
				<li><a href="#app">Our App</a></li>
				<li><a href="#contact">Contact Us</a></li>
				<li><a href="{{ url('/login') }}">Login</a></li>
				<li><a href="{{ url('/register') }}">Register</a></li>
			</ul>
			@elseif(Auth::guest() == false && Auth::user()->is_admin == 0)
			<ul>
				<li><a href="{{ url('/users/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/announcements') }}">Announcements</a></li>
				<li><a href="{{ url('/games') }}">Games</a></li>
				<li><a href="{{ url('/events') }}">Events</a></li>
				<li><a href="{{ url('/users/logout') }}">Logout</a></li>
			</ul>
			@elseif(Auth::guest() == false && Auth::user()->is_admin == 1)
			<ul>
				<li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/announcements') }}">Announcements</a></li>
				<li><a href="{{ url('/admin/games') }}">Games</a></li>
				<li><a href="{{ url('/admin/events') }}">Events</a></li>
				<li><a href="{{ url('/admin/logout') }}">Logout</a></li>
			</ul>
			@endif
		</nav>
	</div>
</header>