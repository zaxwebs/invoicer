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
			<div x-bind:class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
				class="fixed inset-y-0 left-0 z-30 h-screen text-white transition-transform transform w-72 bg-slate-950 lg:translate-x-0 lg:z-auto lg:w-72 lg:fixed"
				x-cloak>
				<div class="px-8 py-6 pb-3">
					<img class="w-24" src="{{ asset('images/logo.svg') }}" alt="logo" />
				</div>
				<div class="p-4">

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
			<div @click="sidebarOpen = false" x-bind:class="{'block': sidebarOpen, 'hidden': !sidebarOpen}"
				class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden" x-cloak>
			</div>

			{{-- Content --}}
			<div class="flex-1 lg:ml-72">
				{{-- Offset content by the sidebar width on larger screens --}}
				{{-- Toggle Button (visible on small screens) --}}
				<div
					class="flex items-center justify-between px-4 py-2 bg-white border-b border-gray-200 shadow dark:bg-gray-800">
					<div>
						{{-- Show toggle button only on small screens --}}
						<button @click="sidebarOpen = !sidebarOpen" class="p-2 text-gray-500 rounded lg:hidden">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" class="size-6">
								<rect width="18" height="18" x="3" y="3" rx="2" />
								<path d="M9 3v18" />
								<path d="m14 9 3 3-3 3" />
							</svg>
						</button>
					</div>
					<x-dropdown align="right" width="48">
						<x-slot name="trigger">
							<button
								class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
								<div>{{ Auth::user()->name }}</div>

								<div class="ms-1">
									<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 20 20">
										<path fill-rule="evenodd"
											d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
											clip-rule="evenodd" />
									</svg>
								</div>
							</button>
						</x-slot>

						<x-slot name="content">
							<x-dropdown-link :href="route('profile.edit')">
								{{ __('Profile') }}
							</x-dropdown-link>

							<!-- Authentication -->
							<form method="POST" action="{{ route('logout') }}">
								@csrf

								<x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
									{{ __('Log Out') }}
								</x-dropdown-link>
							</form>
						</x-slot>
					</x-dropdown>
				</div>
				@isset($header)
					<header class="bg-white border-b border-gray-200 dark:bg-gray-800">
						<div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
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