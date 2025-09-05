<template>
  	<div>
		<PageHeading :label="'Service Providers'" />

		<div class="mb-4">
			<label for="categories">Filter by category:</label>
			<select id="categories" class="bg-blue border border-blue text-white text-sm rounded-lg focus:blue focus:border-blue block w-full p-2.5" v-model="selectedOption" @change="filterByCategory">
				<option value="">Choose a category</option>
				<option v-for="cat in categories" :key="cat.id" :value="cat.slug">
				{{ cat.name }}
				</option>
			</select>
		</div>

		<ul>
			<li v-for="p in providers.data" :key="p.id" class="mb-2">
				<div class="p-4 border-blue bg-blue rounded-lg cursor-pointer hover:bg-opacity-90" @click="router.get(`/providers/${p.slug}`)">
					<ProviderProfileCard :provider="p" />
				</div>
			</li>
		</ul>

    	<Pagination :links="providers.links" />
  	</div>
</template>

<script setup>
  	import { router } from '@inertiajs/vue3'
  	import Pagination from '@/Components/Pagination.vue'
	import ProviderProfileCard from '@/Components/ProviderProfileCard.vue'
	import PageHeading from '@/Components/PageHeading.vue'

	const props = defineProps({
		categories: {
			type: Array,
			required: true,
		},
		providers: {
			type: Object,
			required: true,
		},
		selectedCategory: {
			type: String,
			required: true,
		},
	})

  	let selectedOption = props.selectedCategory

	/**
	 * Filtering categories on selection
	 */
	function filterByCategory() {
		(selectedOption.length > 0) ?
			router.get('/', { category: selectedOption }, { preserveState: true }) :
			router.get('/')
	}
</script>
