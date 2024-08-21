<button type="button"
	class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
	aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal"
	data-hs-overlay="#hs-scale-animation-modal">
	Open modal
</button>

<div id="hs-scale-animation-modal"
	class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
	role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
	<div
		class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
		<div
			class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
			<div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
				<h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
					Modal title
				</h3>
				<button type="button"
					class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
					aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
					<span class="sr-only">Close</span>
					<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
						viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round">
						<path d="M18 6 6 18"></path>
						<path d="m6 6 12 12"></path>
					</svg>
				</button>
			</div>
			<div class="p-4 overflow-y-auto">
				<p class="mt-1 text-gray-800 dark:text-neutral-400">
					This is a wider card with supporting text below as a natural lead-in to additional content.
				</p>
			</div>
			<div class="flex items-center justify-end px-4 py-3 border-t gap-x-2 dark:border-neutral-700">
				<button type="button"
					class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
					data-hs-overlay="#hs-scale-animation-modal">
					Close
				</button>
				<button type="button"
					class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
					Save changes
				</button>
			</div>
		</div>
	</div>
</div>