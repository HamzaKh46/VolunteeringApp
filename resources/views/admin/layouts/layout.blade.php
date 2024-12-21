<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>@yield('admin_page_title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<link href="{{asset('admin_dash/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Admin Panel</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>

					<li class="sidebar-item {{request()->routeIs('admin')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					

					<li class="sidebar-item {{request()->routeIs('emails.contact-form')?'active':''}}">
						<a class="sidebar-link" href="{{route('emails.contact-form')}}">
              <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Emails</span>
            </a>
					</li>

                    <li class="sidebar-header">
						User Management
					</li>

					<li class="sidebar-item {{request()->routeIs('user.create')?'active':''}}">
						<a class="sidebar-link" href="{{route('user.create')}}">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create</span>
            </a>
					</li>

                    <li class="sidebar-item {{request()->routeIs('user.manage')?'active':''}}">
						<a class="sidebar-link" href="{{route('user.manage')}}">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
            </a>
					</li>
                    

					

					

					<li class="sidebar-header">
						News Management
					</li>

					<li class="sidebar-item {{request()->routeIs('news.create')?'active':''}}">
						<a class="sidebar-link" href="{{route('news.create')}}">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create</span>
            </a>
					</li>

					<li class="sidebar-item {{request()->routeIs('news.manage')?'active':''}}">
						<a class="sidebar-link" href="{{route('news.manage')}}">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
            </a>
					</li>


					<li class="sidebar-header">
						FAQ Category
					</li>
					<li class="sidebar-item {{request()->routeIs('category.create')?'active':''}}">
						<a class="sidebar-link" href="{{route('category.create')}}">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create</span>
            </a>
					</li>

					<li class="sidebar-item {{request()->routeIs('category.manage')?'active':''}}">
						<a class="sidebar-link" href="{{route('category.manage')}}">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
            </a>
					</li>




					<li class="sidebar-header">
						Questions & Answers
					</li>
					<li class="sidebar-item {{request()->routeIs('faq.create')?'active':''}}">
						<a class="sidebar-link" href="{{route('faq.create')}}">
							<i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Create</span>
						</a>
					</li>
				
					<li class="sidebar-item {{request()->routeIs('faq.manage')?'active':''}}">
						<a class="sidebar-link" href="{{route('faq.manage')}}">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
						</a>
					</li>

					
				</ul>

				
			</div>
		</nav>
			
			

		<div class="main">

			
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                {{-- <img src="{{ asset('storage/' . ($user->picture ?? 'profile_photos/default.jpg')) }}" class="avatar img-fluid rounded me-1" /> <br><span class="text-dark">{{$user_info->name}}</span> --}}
				<img src="{{ asset('storage/' . $user_info->picture) }}" class="w-12 h-12 rounded-full" alt="{{ $user_info->name }}" /><span class="text-dark">{{ $user_info->name }}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{route('profile.edit')}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>

								<div class="dropdown-divider"></div>                              
								<form  action="{{ route('logout') }}" method="POST" >
									@csrf
									<button type="submit" class="btn btn-danger d-flex align-items-center">
										<i class="fas fa-sign-out-alt me-2"></i> Logout
									</button>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				
				<div class="container-fluid p-0">
					


					@yield('admin_layout')
					<br>
					<a href="{{route('welcome')}}" class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
						Back To Home
						<svg class="ms-2 rtl:rotate-180 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" aria-hidden="true">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
						</svg>
					</a>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{asset('admin_dash/js/app.js')}}"></script>

</body>

</html>