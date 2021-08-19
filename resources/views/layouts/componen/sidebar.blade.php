<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="/dashboard" class="site_title"><img src="{{ asset('images/logo-white.png') }}" class="img-fluid" style="width: 80px;" alt=""></a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src=" {{ asset('/admin/production/images/img.jpg') }}  " alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2>John Doe</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3>General</h3>
				<ul class="nav side-menu">
					<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="index.html">Dashboard</a></li>
							<li><a href="index2.html">Dashboard2</a></li>
							<li><a href="index3.html">Dashboard3</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-home"></i> Curhat <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ route('curhat.index') }}">Curhat</a></li>
							<li><a href="index2.html">Jawab</a></li>
							{{-- <li><a href="index3.html">Dashboard3</a></li> --}}
						</ul>
					</li>
					<li><a><i class="fa fa-truck"></i> Goods Come <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a>1. Shipping Documents<span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li class="sub_menu"><a href=" {{ route('shipping_documents.create') }} ">A. Input</a></li>
									<li class="sub_menu"><a href=" {{ route('shipping_documents.hanging_documents') }} ">B. Hanging Documents</a></li>
									<li><a href="{{ url('/goods_come/shipping_documents/') }}">C. View Data</a>
									</li>
								</ul>
							</li>
							<li><a>2. Technical Documents<span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li class="sub_menu"><a href="{{ route('technical_documents.create') }}">A. Input</a></li>
									<li><a href="{{ route('technical_documents.hanging_documents') }}">B. Hanging Documents</a>
									<li><a href="{{ url('/goods_come/technical_documents/') }}">C. View Data</a>
									</li>
								</ul>
							</li>
							<li><a href="{{ route('goods_come.index') }}">3. View Data</a></li>
							{{-- <li><a href="form_validation.html">5. Update dan Delete</a></li> --}}
						</ul>
					</li>
					<li><a><i class="fa fa-desktop"></i> Komputer DNP PG <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							@php
									$arrUrlKomputer = [
										"computers.index" => 'View Data',
										"computers.create" => 'Input Komputer'
									]
							@endphp
							@foreach ($arrUrlKomputer as $key => $item)
								<li><a href="{{ route($key) }}">{{ $item }}</a></li>
							@endforeach
						</ul>
					</li>

					<li><a><i class="fa fa-laptop"></i> Laptop DNP <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ route('laptop.index') }}">View Data</a></li>
							<li><a href="{{ route('laptop.create') }}">Input</a></li>
							<li><a href="{{ route('device_laptop.create') }}">Input List Laptop</a></li>
							{{-- @foreach ($arrUrlKomputer as $key => $item)
								<li><a href="{{ route($key) }}">{{ $item }}</a></li>
							@endforeach --}}
						</ul>
					</li>

					<li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="general_elements.html">General Elements</a></li>
							<li><a href="media_gallery.html">Media Gallery</a></li>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="icons.html">Icons</a></li>
							<li><a href="glyphicons.html">Glyphicons</a></li>
							<li><a href="widgets.html">Widgets</a></li>
							<li><a href="invoice.html">Invoice</a></li>
							<li><a href="inbox.html">Inbox</a></li>
							<li><a href="calendar.html">Calendar</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="tables.html">Tables</a></li>
							<li><a href="tables_dynamic.html">Table Dynamic</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="chartjs.html">Chart JS</a></li>
							<li><a href="chartjs2.html">Chart JS2</a></li>
							<li><a href="morisjs.html">Moris JS</a></li>
							<li><a href="echarts.html">ECharts</a></li>
							<li><a href="other_charts.html">Other Charts</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
							<li><a href="fixed_footer.html">Fixed Footer</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="menu_section">
				<h3>Live On</h3>
				<ul class="nav side-menu">
					<li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="e_commerce.html">E-commerce</a></li>
							<li><a href="projects.html">Projects</a></li>
							<li><a href="project_detail.html">Project Detail</a></li>
							<li><a href="contacts.html">Contacts</a></li>
							<li><a href="profile.html">Profile</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="page_403.html">403 Error</a></li>
							<li><a href="page_404.html">404 Error</a></li>
							<li><a href="page_500.html">500 Error</a></li>
							<li><a href="plain_page.html">Plain Page</a></li>
							<li><a href="login.html">Login Page</a></li>
							<li><a href="pricing_tables.html">Pricing Tables</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
								<li><a href="#level1_1">Level One</a>
								<li><a>Level One<span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li class="sub_menu"><a href="level2.html">Level Two</a>
										</li>
										<li><a href="#level2_1">Level Two</a>
										</li>
										<li><a href="#level2_2">Level Two</a>
										</li>
									</ul>
								</li>
								<li><a href="#level1_2">Level One</a>
								</li>
						</ul>
					</li>                  
					<li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
				</ul>
			</div>

		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>