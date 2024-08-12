@props(['id' => 'alert'])

@if(session($id))
	<div {{ $attributes->class(['text-teal-800 border-teal-500 bg-teal-50' => session($id)['type'] === 'success','text-blue-800 border-blue-500 bg-blue-50' => session($id)['type'] === 'info', 'text-red-800 border-red-500 bg-red-50' => session($id)['type'] === 'danger'])->merge(['class' => 'p-4 mt-2 text-sm  border  rounded-lg ']) }} role="alert" tabindex="-1">
		<!-- <span id="hs-soft-color-success-label" class="font-bold">Success</span> alert! You should check in on some of those
																					fields below. -->
		{{ session($id)['message'] }}
	</div>
@endif