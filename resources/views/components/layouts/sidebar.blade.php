<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<!-- Scripts -->
	@livewireStyles
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" x-data="{ sidebarOpen: false }">
	<div class="min-h-screen bg-cool dark:bg-gray-900">
		<div class="flex">

			<!-- Sidebar (overlay on mobile, fixed on larger screens) -->
			<div
				:class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" 
				class="fixed inset-y-0 left-0 z-30 w-64 h-screen text-white transition-transform transform bg-slate-950 lg:translate-x-0 lg:z-auto lg:w-64 lg:fixed"
				x-cloak
			>
				<div class="p-4">
					<h1 class="mb-4 ml-4 text-xl font-semibold">Invoicer</h1>
					<ul>
						<li><a href="#" class="block px-4 py-2 hover:bg-gray-800">Dashboard</a></li>
						<li><a href="#" class="block px-4 py-2 hover:bg-gray-800">Profile</a></li>
						<li><a href="#" class="block px-4 py-2 hover:bg-gray-800">Settings</a></li>
						<li><a href="#" class="block px-4 py-2 hover:bg-gray-800">Logout</a></li>
					</ul>
				</div>
			</div>

			<!-- Overlay (for small screens) -->
			<div 
				@click="sidebarOpen = false" 
				:class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" 
				class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"
				x-cloak
			>
		</div>

			<!-- Content -->
			<div class="flex-1 lg:ml-64">
				<!-- Offset content by the sidebar width on larger screens -->
				<!-- Toggle Button (visible on small screens) -->
				<header class="flex items-center justify-between p-4 bg-white shadow dark:bg-gray-800">
					<h1 class="text-xl font-medium">{{ __('Dashboard') }}</h1>
					<!-- Show toggle button only on small screens -->
					<button @click="sidebarOpen = !sidebarOpen" class="px-4 py-2 text-white bg-gray-700 rounded lg:hidden">
						Toggle Sidebar
					</button>
				</header>

				<main>
					{{ $slot }}
				</main>
			</div>

		</div>
	</div>
	@livewireScriptConfig
</body>

</html>
