@if(session('alert'))
	<div class="p-4 mt-2 text-sm text-teal-800 bg-teal-100 border border-teal-200 rounded-lg dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
		role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
		<!-- <span id="hs-soft-color-success-label" class="font-bold">Success</span> alert! You should check in on some of those
					fields below. -->
		{{ session('alert') }}
	</div>
@endif