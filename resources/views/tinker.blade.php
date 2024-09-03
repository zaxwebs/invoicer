<x-app-layout>
	<div class="p-4 space-y-6">
		<x-primary-button x-data=""
			x-on:click.prevent="$dispatch('open-modal', 'X')">{{ __('Open Modal') }}</x-primary-button>
		<x-modal name="X">
			<div class="p-4">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem atque doloribus quidem, corporis, deserunt
				soluta eaque vero quaerat accusantium in provident totam aliquam. Quos qui praesentium officia, culpa
				iure
				libero.
			</div>
		</x-modal>
	</div>
</x-app-layout>