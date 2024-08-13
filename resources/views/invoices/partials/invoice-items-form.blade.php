<div class="mt-6" x-data="itemsManager()">
	<input name="items" type="hidden" x-bind:value="JSON.stringify(items)">
	<div class="p-4 space-y-4 border border-gray-200 rounded-lg dark:border-neutral-700">
		<div class="hidden sm:grid sm:grid-cols-5">
			<div class="text-xs font-medium text-gray-500 uppercase sm:col-span-2 dark:text-neutral-500">
				Item</div>
			<div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
				Rate
			</div>
			<div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
				Qty
			</div>
			<div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">
				Total
			</div>
		</div>

		<div class="hidden border-b border-gray-200 sm:block dark:border-neutral-700"></div>

		<template x-for="(item, index) in items" :key="index">
			<div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
				<div class="col-span-full sm:col-span-2">
					<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
						Item
					</h5>
					<p class="font-medium text-gray-800 dark:text-neutral-200">
						<x-text-input class="w-full" type="text" x-model="item.name"
							@input="checkAndAddNewItem(index)" />
					</p>
				</div>
				<div>
					<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
						Rate
					</h5>
					<p class="text-gray-800 dark:text-neutral-200">
						<x-text-input class="w-full" type="number" min="0" x-model="item.rate"
							@input="checkAndAddNewItem(index)" />
					</p>
				</div>
				<div>
					<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
						Qty
					</h5>
					<p class="text-gray-800 dark:text-neutral-200">
						<x-text-input class="w-full" type="number" min="1" x-model="item.quantity"
							@input="checkAndAddNewItem(index)" />
					</p>
				</div>
				<div>
					<h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
						Total</h5>
					<p class="text-gray-800 sm:text-end dark:text-neutral-200">
						$<span x-text="item.rate * item.quantity"></span>
					</p>
				</div>
			</div>
		</template>

	</div>
</div>

<script>
	function itemsManager() {
		return {
			items: [{ name: '', quantity: 1, rate: '' }],

			checkAndAddNewItem(index) {
				// Check if the current item has non-empty fields
				const item = this.items[index];

				// Add a new item if the current one is not the last one
				if (item.name || item.quantity || item.rate) {
					if (index === this.items.length - 1) {
						this.items.push({ name: '', quantity: 1, rate: '' });
					}
				}

				// Remove empty items except for the last one
				this.items = this.items.filter((item, i) => {
					return (i === this.items.length - 1) || (item.name || item.quantity || item.rate);
				});
			}
		};
	}
</script>