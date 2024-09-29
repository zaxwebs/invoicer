<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	{{-- Fonts --}}
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	{{-- Scripts --}}
	@livewireStyles
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" x-data="{ sidebarOpen: false }">
	<div class="min-h-screen bg-cool dark:bg-gray-900">
		<div class="flex">

			{{-- Sidebar (overlay on mobile, fixed on larger screens) --}}
			<div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
				class="fixed inset-y-0 left-0 z-30 w-64 h-screen text-white transition-transform transform bg-slate-950 lg:translate-x-0 lg:z-auto lg:w-72 lg:fixed"
				x-cloak>
				<div class="p-5">
					<h1 class="mb-6 ml-5 text-xl font-semibold">Invoicer</h1>
					<ul class="flex flex-col space-y-1">
						<li>
							<a @class(['bg-white/10' => request()->routeIs('dashboard'), 'flex items-center gap-x-3.5 py-3 px-4 text-white rounded-lg hover:bg-white/10 focus:outline-none focus:bg-white/10 dark:bg-neutral-700 dark:text-white']) href="{{ route('dashboard') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="size-5">
									<path d="M15.6 2.7a10 10 0 1 0 5.7 5.7" />
									<circle cx="12" cy="12" r="2" />
									<path d="M13.4 10.6 19 5" />
								</svg>
								Dashboard
							</a>
						</li>
						<li>
							<a @class(['bg-white/10' => request()->routeIs(patterns: 'invoices.index'), 'flex items-center gap-x-3.5 py-3 px-4 text-white rounded-lg hover:bg-white/10 focus:outline-none focus:bg-white/10 dark:bg-neutral-700 dark:text-white'])
								href="{{ route('invoices.index') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="size-5">
									<path
										d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z" />
									<path
										d="m6.08 9.5-3.5 1.6a1 1 0 0 0 0 1.81l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9a1 1 0 0 0 0-1.83l-3.5-1.59" />
									<path
										d="m6.08 14.5-3.5 1.6a1 1 0 0 0 0 1.81l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9a1 1 0 0 0 0-1.83l-3.5-1.59" />
								</svg>
								Invoices
							</a>
						</li>
						<li>
							<a @class(['bg-white/10' => request()->routeIs('customers.index'), 'flex items-center gap-x-3.5 py-3 px-4 text-white rounded-lg hover:bg-white/10 focus:outline-none focus:bg-white/10 dark:bg-neutral-700 dark:text-white'])
								href="{{ route('customers.index') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="size-5">
									<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
									<circle cx="9" cy="7" r="4" />
									<path d="M22 21v-2a4 4 0 0 0-3-3.87" />
									<path d="M16 3.13a4 4 0 0 1 0 7.75" />
								</svg>
								Customers
							</a>
						</li>
						<li>
							<a @class(['bg-white/10' => request()->routeIs('settings.edit'), 'flex items-center gap-x-3.5 py-3 px-4 text-white rounded-lg hover:bg-white/10 focus:outline-none focus:bg-white/10 dark:bg-neutral-700 dark:text-white']) href="{{ route('settings.edit') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="size-5">
									<path
										d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
									<circle cx="12" cy="12" r="3" />
								</svg>
								Settings
							</a>
						</li>
					</ul>

				</div>
			</div>

			{{-- Overlay (for small screens) --}}
			<div @click="sidebarOpen = false" :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}"
				class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden" x-cloak>
			</div>

			{{-- Content --}}
			<div class="flex-1 lg:ml-72">
				{{-- Offset content by the sidebar width on larger screens --}}
				{{-- Toggle Button (visible on small screens) --}}
				<header class="flex items-center justify-between p-4 bg-white shadow dark:bg-gray-800">
					<h1 class="text-xl font-medium">{{ __('Dashboard') }}</h1>
					{{-- Show toggle button only on small screens --}}
					<button @click="sidebarOpen = !sidebarOpen"
						class="px-4 py-2 text-white bg-gray-700 rounded lg:hidden">
						Toggle Sidebar
					</button>
				</header>
				@isset($header)
					<header class="bg-white border-b border-gray-100 dark:bg-gray-800">
						<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
							{{ $header }}
						</div>
					</header>
				@endisset

				<x-alert class="border-t-0 border-b rounded-none border-x-0 border-r-none" />

				<main>
					{{ $slot }}
				</main>
			</div>
		</div>
	</div>
	@livewireScriptConfig
</body>

</html>