<x-app-layout>
	<x-slot name="header">
		<div class="flex items-center justify-between">
			<h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
				Invoice — <span
					class="text-sm font-normal tracking-wider text-gray-500">{{ $invoice->invoice_number }}</span>
			</h2>
			<div class="flex gap-2">
				@foreach ($invoice->statuses as $status)
					<x-status-badge :status="$status" />
				@endforeach
			</div>
		</div>
	</x-slot>
	<div class="py-12">
		<div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
			<div class="grid gap-6 lg:grid-cols-6">
				<div class="lg:col-span-4">
					<div>
						<!-- Card -->
						<div class="flex flex-col p-4 bg-white shadow-md sm:p-10 rounded-xl dark:bg-neutral-800">
							<!-- Grid -->
							<div class="flex justify-between">
								<div>
									@if ($settings->logo)
										<img class="mb-4 max-w-60 max-h-40" src="{{ asset('storage/' . $settings->logo) }}"
											alt="Logo">
									@endif

									<h1 class="text-lg font-semibold text-blue-700 dark:text-blue-300 md:text-xl">
										{{ $invoice->issuer_details['name'] }}
									</h1>
									<div>{{ $invoice->issuer_details['website'] }}</div>
								</div>
								<!-- Col -->

								<div class="text-end">
									<h2 class="text-2xl font-semibold text-gray-800 md:text-3xl dark:text-neutral-200">
										Invoice #
									</h2>
									<span
										class="block mt-1 text-gray-500 dark:text-neutral-500">{{ $invoice->invoice_number}}</span>

									<address
										class="mt-4 not-italic text-gray-800 whitespace-pre-line dark:text-neutral-200">
										{{ $invoice->issuer_details['address'] }}
									</address>
								</div>
								<!-- Col -->
							</div>
							<!-- End Grid -->

							<!-- Grid -->
							<div class="grid gap-3 mt-8 sm:grid-cols-2">
								<div>
									<h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Bill to:</h3>
									<h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
										{{ $invoice->customer_details['name'] }}
									</h3>
									<address
										class="mt-2 not-italic text-gray-500 whitespace-pre-line dark:text-neutral-500">
										{{ $invoice->customer_details['address'] }}
									</address>
								</div>
								<!-- Col -->

								<div class="space-y-2 sm:text-end">
									<!-- Grid -->
									<div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
										<dl class="grid sm:grid-cols-5 gap-x-3">
											<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
												Invoice
												date:
											</dt>
											<dd class="col-span-2 text-gray-500 dark:text-neutral-500">
												{{ $invoice->created_at->format('Y-m-d') }}
											</dd>
										</dl>
										<dl class="grid sm:grid-cols-5 gap-x-3">
											<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due
												date:</dt>
											<dd class="col-span-2 text-gray-500 dark:text-neutral-500">
												{{ $invoice->due_date }}
											</dd>
										</dl>
									</div>
									<!-- End Grid -->
								</div>
								<!-- Col -->
							</div>
							<!-- End Grid -->

							<!-- Table -->
							<div class="mt-6">
								<div class="p-4 space-y-4 border border-gray-200 rounded-lg dark:border-neutral-700">
									<div class="hidden sm:grid sm:grid-cols-5">
										<div
											class="text-xs font-medium text-gray-500 uppercase sm:col-span-2 dark:text-neutral-500">
											Item
										</div>
										<div
											class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
											Rate
										</div>
										<div
											class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
											Qty
										</div>
										<div
											class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">
											Amount
										</div>
									</div>

									<div class="hidden border-b border-gray-200 sm:block dark:border-neutral-700"></div>

									@foreach ($invoice->items as $item)
										<div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
											<div class="col-span-full sm:col-span-2">
												<h5
													class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
													Item
												</h5>
												<p class="font-medium text-gray-800 dark:text-neutral-200">
													{{ $item['name'] }}
												</p>
											</div>
											<div>
												<h5
													class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
													Rate
												</h5>
												<p class="text-gray-800 dark:text-neutral-200">{{ $item['rate'] }}</p>
											</div>
											<div>
												<h5
													class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
													Qty
												</h5>
												<p class="text-gray-800 dark:text-neutral-200">{{ $item['quantity'] }}</p>
											</div>
											<div>
												<h5
													class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
													Amount</h5>
												<p class="text-gray-800 sm:text-end dark:text-neutral-200">
													<x-money :value="$item['total']" />
												</p>
											</div>
										</div>
										@if (!$loop->last)
											<div class="border-b border-gray-200 sm:hidden dark:border-neutral-700"></div>
										@endif
									@endforeach
								</div>
							</div>
							<!-- End Table -->

							<!-- Flex -->
							<div class="flex mt-8 sm:justify-end">
								<div class="w-full max-w-2xl space-y-2 sm:text-end">
									<!-- Grid -->
									<div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">

										<dl class="grid sm:grid-cols-5 gap-x-3">
											<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
												Total:
											</dt>
											<dd class="col-span-2 text-gray-500 dark:text-neutral-500">
												<x-money value="{{ $invoice->total }}" />
											</dd>
										</dl>

										<!-- <dl class="grid sm:grid-cols-5 gap-x-3">
										<dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Tax:
										</dt>
										<dd class="col-span-2 text-gray-500 dark:text-neutral-500">$39.00</dd>
									</dl> -->

									</div>
									<!-- End Grid -->
								</div>
							</div>
							<!-- End Flex -->

							<div class="mt-8 sm:mt-12">
								<h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Thank you!</h4>
								<p class="text-gray-500 dark:text-neutral-500">If you have any questions concerning this
									invoice,
									use
									the following contact information:</p>
								<div class="mt-2">
									<p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">
										{{ $invoice->issuer_details['email'] }}
									</p>
									<p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">
										{{ $invoice->issuer_details['phone'] }}
									</p>
								</div>
							</div>

							<p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024
								{{ $invoice->issuer_details['name'] }}.
							</p>
						</div>
						<!-- End Card -->

						<!-- Buttons -->
						<!-- <div class="flex justify-end mt-6 gap-x-3">
						<a class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
							href="#">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
								stroke-linecap="round" stroke-linejoin="round">
								<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
								<polyline points="7 10 12 15 17 10" />
								<line x1="12" x2="12" y1="15" y2="3" />
							</svg>
							Invoice PDF
						</a>
						<a class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
							href="#">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
								stroke-linecap="round" stroke-linejoin="round">
								<polyline points="6 9 6 2 18 2 18 9" />
								<path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
								<rect width="12" height="8" x="6" y="14" />
							</svg>
							Print
						</a>
					</div> -->
						<!-- End Buttons -->
					</div>
				</div>
				<div class="space-y-6 lg:col-span-2">
					<form action="{{ route('invoices.update-status', $invoice->id) }}" method="POST">
						@csrf
						@method('PATCH')
						<div class="flex gap-2">
							<x-select name="status" class="form-select" required>
								@foreach(\App\Enums\InvoiceStatus::fillableStatuses() as $status)
									<option value="{{ $status->value }}" {{ $invoice->status->value === $status->value ? 'selected' : '' }}>
										{{ $status->label() }}
									</option>
								@endforeach
							</x-select>
							<x-primary-button class="whitespace-nowrap">Update Status</x-primary-button>
						</div>
					</form>
					<x-link class="block" href="{{ route('customers.show', $invoice->customer) }}">
						<div class="flex items-center gap-4 p-6 bg-white shadow dark:bg-gray-800 sm:rounded-lg">
							<x-avatar :customer="$invoice->customer" class="size-14" />
							<div>
								<div>{{ $invoice->customer->name }}</div>
								<div class="text-gray-500">{{ $invoice->customer->email }}</div>
							</div>
						</div>
					</x-link>

					@include('invoices.partials.note-card')
				</div>

			</div>
		</div>

</x-app-layout>