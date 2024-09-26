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
		<main class="mb-40 space-y-40 bg-white">

			<div class="relative" id="home">
				<div aria-hidden="true"
					class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20">
					<div class="blur-[106px] h-56 bg-gradient-to-br from-sky-300 to-purple-400 dark:from-blue-700">
					</div>
					<div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300 dark:to-indigo-600">
					</div>
				</div>
				<div class="px-6 mx-auto max-w-7xl md:px-12 xl:px-6">
					<div class="relative ml-auto pt-36">

						<div class="mx-auto text-center lg:w-2/3">
							<h1 class="text-5xl font-bold text-gray-900 dark:text-white md:text-6xl xl:text-7xl">
								Easy Invoicing for <span class="text-blue-600 dark:text-white">Freelancers.</span></h1>
							<p class="mt-8 text-gray-700 dark:text-gray-300">Effortlessly manage your invoices,
								customers, and finances with a solution designed for simplicity. Built to streamline
								your business processes, Invoicer makes staying organized and getting paid easier than
								ever.</p>
							<div class="flex flex-wrap justify-center mt-16 gap-y-4 gap-x-6">
								<a href="#"
									class="relative flex items-center justify-center w-full px-6 h-11 before:absolute before:inset-0 before:rounded-full before:bg-blue-600 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
									<span class="relative text-base font-semibold text-white">Get started</span>
								</a>
								<a href="#"
									class="relative flex items-center justify-center w-full px-6 h-11 before:absolute before:inset-0 before:rounded-full before:border before:border-transparent before:bg-blue-600/10 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800 sm:w-max">
									<span class="relative text-base font-semibold text-blue-600 dark:text-white">Learn
										more</span>
								</a>
							</div>
							<div
								class="justify-between hidden py-8 mt-16 border-gray-100 border-y dark:border-gray-800 sm:flex">
								<div class="text-center">
									<h6 class="text-lg font-semibold text-gray-700 dark:text-white">Hassle-Free
									</h6>
									<p class="mt-2 text-gray-500">Invoicing with zero fluff.</p>
								</div>
								<div class="text-center">
									<h6 class="text-lg font-semibold text-gray-700 dark:text-white">Reports & Analytics
									</h6>
									<p class="mt-2 text-gray-500">Track your invoices and fianaces.</p>
								</div>
								<div class="text-center">
									<h6 class="text-lg font-semibold text-gray-700 dark:text-white">Customizable</h6>
									<p class="mt-2 text-gray-500">Logos, colors and a lot more.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="features">
				<div class="px-6 mx-auto max-w-7xl md:px-12 xl:px-6">
					<div class="md:w-2/3 lg:w-1/2">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
							class="w-6 h-6 text-secondary">
							<path fill-rule="evenodd"
								d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z"
								clip-rule="evenodd"></path>
						</svg>

						<h2 class="my-8 text-2xl font-bold text-gray-700 dark:text-white md:text-4xl">
							Feature-Packed with Simplicity at Its Core
						</h2>
						<p class="text-gray-600 dark:text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing
							elit. Natus ad ipsum pariatur autem, fugit laborum in atque amet obcaecati? Nisi minima
							aspernatur, quidem nulla cupiditate nam consequatur eligendi magni adipisci.</p>
					</div>
					<div
						class="grid mt-16 overflow-hidden text-gray-600 border border-gray-100 divide-x divide-y divide-gray-100 dark:divide-gray-700 rounded-3xl dark:border-gray-700 sm:grid-cols-2 lg:grid-cols-4 lg:divide-y-0 xl:grid-cols-4">
						<div
							class="group relative bg-white dark:bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
							<div class="relative p-8 py-12 space-y-8">
								<img src="https://cdn-icons-png.flaticon.com/512/4341/4341139.png" class="w-12"
									width="512" height="512" alt="burger illustration">

								<div class="space-y-2">
									<h5
										class="text-xl font-semibold text-gray-700 transition dark:text-white group-hover:text-secondary">
										Invoices
									</h5>
									<p class="text-gray-600 dark:text-gray-300">
										Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
									</p>
								</div>
							</div>
						</div>
						<div
							class="group relative bg-white dark:bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
							<div class="relative p-8 py-12 space-y-8">
								<img src="https://cdn-icons-png.flaticon.com/512/4341/4341134.png" class="w-12"
									width="512" height="512" alt="burger illustration">

								<div class="space-y-2">
									<h5
										class="text-xl font-semibold text-gray-700 transition dark:text-white group-hover:text-secondary">
										Customers
									</h5>
									<p class="text-gray-600 dark:text-gray-300">
										Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
									</p>
								</div>
							</div>
						</div>
						<div
							class="group relative bg-white dark:bg-gray-800 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
							<div class="relative p-8 py-12 space-y-8">
								<img src="https://cdn-icons-png.flaticon.com/512/4341/4341160.png" class="w-12"
									width="512" height="512" alt="burger illustration">

								<div class="space-y-2">
									<h5
										class="text-xl font-semibold text-gray-700 transition dark:text-white group-hover:text-secondary">
										Reports
									</h5>
									<p class="text-gray-600 dark:text-gray-300">
										Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
									</p>
								</div>
							</div>
						</div>
						<div
							class="group relative bg-gray-50 dark:bg-gray-900 transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
							<div
								class="relative p-8 py-12 space-y-8 transition duration-300 group-hover:bg-white dark:group-hover:bg-gray-800">
								<img src="https://cdn-icons-png.flaticon.com/512/4341/4341025.png" class="w-12"
									width="512" height="512" alt="burger illustration">

								<div class="space-y-2">
									<h5
										class="text-xl font-semibold text-gray-700 transition dark:text-white group-hover:text-secondary">
										More features
									</h5>
									<p class="text-gray-600 dark:text-gray-300">
										Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="solution">
				<div class="px-6 mx-auto max-w-7xl md:px-12 xl:px-6">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
						class="w-6 h-6 text-sky-500">
						<path fill-rule="evenodd"
							d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"
							clip-rule="evenodd"></path>
						<path fill-rule="evenodd"
							d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"
							clip-rule="evenodd"></path>
					</svg>
					<div
						class="flex-row-reverse justify-between space-y-6 text-gray-600 md:flex md:gap-6 md:space-y-0 lg:gap-12 lg:items-center">
						<div class="md:5/12 lg:w-1/2">
							<img src="/images/pie.svg" alt="image" loading="lazy" width="" height="" class="w-full">
						</div>
						<div class="md:7/12 lg:w-1/2">
							<h2 class="text-3xl font-bold text-gray-900 md:text-4xl dark:text-white">
								Track Invoices and Finances in Real-Time
							</h2>
							<p class="my-8 text-gray-600 dark:text-gray-300">
								Nobis minus voluptatibus pariatur dignissimos libero quaerat iure expedita at?
								Asperiores nemo possimus nesciunt dicta veniam aspernatur quam mollitia. <br> <br> Vitae
								error, quaerat officia delectus voluptatibus explicabo quo pariatur impedit, at
								reprehenderit aliquam a ipsum quas voluptatem. Quo pariatur asperiores eum amet.
							</p>
							<div class="space-y-4 divide-y divide-gray-100 dark:divide-gray-800">
								<div class="flex gap-4 mt-8 md:items-center">
									<div class="flex w-12 h-12 gap-4 bg-indigo-100 rounded-full dark:bg-indigo-900/20">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
											class="w-6 h-6 m-auto text-indigo-500 dark:text-indigo-400">
											<path fill-rule="evenodd"
												d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z"
												clip-rule="evenodd"></path>
										</svg>
									</div>
									<div class="w-5/6">
										<h3 class="text-lg font-semibold text-gray-700 dark:text-indigo-300">
											Totals on Current and Paid Invoices
										</h3>
										<p class="text-gray-500 dark:text-gray-400">Asperiores nemo possimus nesciunt
											quam mollitia.</p>
									</div>
								</div>
								<div class="flex gap-4 pt-4 md:items-center">
									<div class="flex w-12 h-12 gap-4 bg-teal-100 rounded-full dark:bg-teal-900/20">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
											class="w-6 h-6 m-auto text-teal-600 dark:text-teal-400">
											<path fill-rule="evenodd"
												d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z"
												clip-rule="evenodd"></path>
										</svg>
									</div>
									<div class="w-5/6">
										<h3 class="text-lg font-semibold text-gray-700 dark:text-teal-300">Dynamic Calculations</h3>
										<p class="text-gray-500 dark:text-gray-400">Asperiores nemo possimus nesciunt
											quam mollitia.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="cta" class="relative py-16">
				<div aria-hidden="true"
					class="absolute inset-0 grid w-full grid-cols-2 m-auto h-max -space-x-52 opacity-20 dark:opacity-20">
					<div class="blur-[106px] h-56 bg-gradient-to-br from-blue-300 to-purple-400 dark:from-blue-700">
					</div>
					<div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300 dark:to-indigo-600"></div>
				</div>
				<div class="px-6 mx-auto max-w-7xl md:px-12 xl:px-6">
					<div class="relative">
						<div class="m-auto mt-6 space-y-6 md:w-8/12 lg:w-7/12">
							<h1 class="text-4xl font-bold text-center text-gray-800 dark:text-white md:text-5xl">Get
								Started now</h1>
							<p class="text-xl text-center text-gray-600 dark:text-gray-300">
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							</p>
							<div class="flex flex-wrap justify-center gap-6">
								<a href="#"
									class="relative flex items-center justify-center w-full h-12 px-8 before:absolute before:inset-0 before:rounded-full before:bg-blue-600 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
									<span class="relative text-base font-semibold text-white dark:text-dark">Get
										Started</span>
								</a>
								<a href="#"
									class="relative flex items-center justify-center w-full h-12 px-8 before:absolute before:inset-0 before:rounded-full before:border before:border-transparent before:bg-blue-600/10 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800 sm:w-max">
									<span class="relative text-base font-semibold text-blue-600 dark:text-white">More
										about</span>
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