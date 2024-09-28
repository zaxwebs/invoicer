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

<body class="font-sans antialiased">
	<div class="min-h-screen bg-gray-100 dark:bg-gray-900">

		<!-- Page Heading -->
		@isset($header)
			<header class="bg-white border-b border-gray-100 dark:bg-gray-800">
				<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
					{{ $header }}
				</div>
			</header>
		@endisset

		<x-alert class="border-t-0 border-b rounded-none border-x-0 border-r-none" />

		<!-- Page Content -->
		<main class="bg-white text-slate-800">

			<div class="py-20 pt-40" id="home">
				<div class="px-6 mx-auto max-w-7xl md:px-12 xl:px-6">
					<div class="relative ml-auto">
						<div class="mx-auto text-center lg:w-2/3">
							<h1 class="text-5xl font-bold dark:text-white md:text-6xl xl:text-7xl">
								Simple Invoicing for <span class="text-indigo-600 dark:text-white">Freelancers.</span>
							</h1>
							<p class="mt-8 text-slate-800 dark:text-slate-300">
								Manage your invoices, clients, and finances effortlessly. Invoicer is designed to
								simplify your workflow,
								making it easier than ever to stay organized and get paid.
							</p>
							<div class="flex flex-wrap justify-center mt-16 gap-y-4 gap-x-6">
								<a href="#"
									class="relative flex items-center justify-center w-full px-6 h-11 before:absolute before:inset-0 before:rounded-full before:bg-indigo-600 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
									<span class="relative text-base font-medium text-white">Get Started</span>
								</a>
								<a href="#"
									class="relative flex items-center justify-center w-full px-6 h-11 before:absolute before:inset-0 before:rounded-full before:border before:border-transparent before:bg-indigo-600/10 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800 sm:w-max">
									<span class="relative text-base font-medium text-indigo-600 dark:text-white">Learn
										More</span>
								</a>
							</div>
							<div
								class="justify-between hidden py-8 mt-16 border-t border-b border-gray-100 sm:flex dark:border-gray-800">
								<div class="text-center">
									<h6 class="text-lg font-semibold dark:text-white">Hassle-Free</h6>
									<p class="mt-2 text-slate-500 dark:text-slate-400">Invoicing without the extra
										fluff.</p>
								</div>
								<div class="text-center">
									<h6 class="text-lg font-semibold dark:text-white">Reports & Analytics</h6>
									<p class="mt-2 text-slate-500 dark:text-slate-400">Track your invoices and finances
										easily.</p>
								</div>
								<div class="text-center">
									<h6 class="text-lg font-semibold dark:text-white">Customizable</h6>
									<p class="mt-2 text-slate-500 dark:text-slate-400">Personalize logos, colors, and
										more.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="py-20" id="features">
				<div class="px-6 mx-auto max-w-7xl md:px-12 xl:px-6">
					<div
						class="grid mt-16 overflow-hidden border border-gray-100 divide-y divide-gray-100 rounded-3xl dark:divide-gray-700 dark:border-gray-700 sm:grid-cols-2 lg:grid-cols-4 lg:divide-y-0">

						<!-- Invoices Feature -->
						<div
							class="relative transition bg-white group dark:bg-gray-800 hover:z-10 hover:shadow-2xl hover:shadow-gray-600/10">
							<div class="relative p-8 py-12 space-y-8">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="lucide lucide-receipt-text">
									<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" />
									<path d="M14 8H8" />
									<path d="M16 12H8" />
									<path d="M13 16H8" />
								</svg>
								<div class="space-y-2">
									<h5
										class="text-xl font-semibold transition dark:text-white group-hover:text-secondary">
										Invoices</h5>
									<p class="dark:text-gray-300">Generate new invoices, view detailed lists, and track
										payment statuses effortlessly.</p>
								</div>
							</div>
						</div>

						<!-- Customers Feature -->
						<div
							class="relative transition bg-white group dark:bg-gray-800 hover:z-10 hover:shadow-2xl hover:shadow-gray-600/10">
							<div class="relative p-8 py-12 space-y-8">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="lucide lucide-users">
									<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
									<circle cx="9" cy="7" r="4" />
									<path d="M22 21v-2a4 4 0 0 0-3-3.87" />
									<path d="M16 3.13a4 4 0 0 1 0 7.75" />
								</svg>
								<div class="space-y-2">
									<h5
										class="text-xl font-semibold transition dark:text-white group-hover:text-secondary">
										Customers</h5>
									<p class="dark:text-gray-300">Easily add, update, and view customer records, all
										organized and accessible.</p>
								</div>
							</div>
						</div>

						<!-- Reports Feature -->
						<div
							class="relative transition bg-white group dark:bg-gray-800 hover:z-10 hover:shadow-2xl hover:shadow-gray-600/10">
							<div class="relative p-8 py-12 space-y-8">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="lucide lucide-clipboard-minus">
									<rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
									<path
										d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
									<path d="M9 14h6" />
								</svg>
								<div class="space-y-2">
									<h5
										class="text-xl font-semibold transition dark:text-white group-hover:text-secondary">
										Reports</h5>
									<p class="dark:text-gray-300">Analyze invoices, track customer trends, and review
										financial summaries with ease.</p>
								</div>
							</div>
						</div>

						<!-- More Features -->
						<div
							class="relative transition group bg-gray-50 dark:bg-gray-900 hover:z-10 hover:shadow-2xl hover:shadow-gray-600/10">
							<div
								class="relative p-8 py-12 space-y-8 transition duration-300 group-hover:bg-white dark:group-hover:bg-gray-800">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="lucide lucide-circle-plus">
									<circle cx="12" cy="12" r="10" />
									<path d="M8 12h8" />
									<path d="M12 8v8" />
								</svg>
								<div class="space-y-2">
									<h5
										class="text-xl font-semibold transition dark:text-white group-hover:text-secondary">
										& More</h5>
									<p class="dark:text-gray-300">A whole bunch of features designed to make invoicing
										easier.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>


			<div id="cta" class="relative py-20 pb-40">
				<div class="px-6 mx-auto max-w-7xl md:px-12 xl:px-6">
					<div class="relative">
						<div class="m-auto mt-6 space-y-6 text-center md:w-8/12 lg:w-7/12">
							<h1 class="text-4xl font-bold text-gray-800 dark:text-white md:text-5xl">Get Started Now
							</h1>
							<p class="dark:text-gray-300">
								Efficient, intuitive, and designed for you. Start managing your invoices now.
							</p>
							<div class="flex flex-wrap justify-center gap-6">
								<a href="#"
									class="relative flex items-center justify-center w-full h-12 px-8 before:absolute before:inset-0 before:rounded-full before:bg-indigo-600 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
									<span class="relative text-base font-medium text-white">Get Started</span>
								</a>
								<a href="#"
									class="relative flex items-center justify-center w-full h-12 px-8 before:absolute before:inset-0 before:rounded-full before:border before:border-transparent before:bg-indigo-600/10 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800 sm:w-max">
									<span class="relative text-base font-medium text-indigo-600 dark:text-white">Learn
										More</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>


		</main>
	</div>
	@livewireScriptConfig
</body>

</html>