<nav class="pcoded-navbar">
	<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu Sidebar</div>

		@if(Auth::user()->level ==1)
		<ul class="pcoded-item pcoded-left-item">
			<li class="active">
				<a href="index.html">
					<span class="pcoded-micon"><i class="ti-clipboard"></i><b>D</b></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Waiter List</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>

		@elseif(Auth::user()->level ==  2)
		<ul class="pcoded-item pcoded-left-item">
			<li class="active">
				<a href="{{route('orderWaiter.index')}}">
					<span class="pcoded-micon"><i class="ti-clipboard"></i><b>D</b></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Order (Open)</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<li class="active">
				<a href="{{route('closeOrder')}}">
					<span class="pcoded-micon"><i class="ti-agenda"></i><b>D</b></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Order (Closed)</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<li class="pcoded-hasmenu">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.basic-components.main">Menu Restoran</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class=" ">
						<a href="{{route('masakan.index')}}">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Menu</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li class=" ">
						<a href="{{route('jenis_masakan.index')}}">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Kategori Menu</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					{{-- <li class=" ">
						<a href="{{route('extra.index')}}">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Menu Extra</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li> --}}
				</ul>

				@endif
				<div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms" class = "mt--6">Log Out</div>
				<li class="active">
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="ti-layout-sidebar-left"></i> Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
				</li>
			</li>
		</ul>
	</div>
</nav>