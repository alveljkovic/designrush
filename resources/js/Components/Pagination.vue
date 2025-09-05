<template>
	<nav class="flex items-center space-x-2 mt-6" role="navigation" aria-label="Pagination">
		<template v-for="(link, i) in links" :key="i">
			<button
				v-if="link.url"
				@click="goTo(link.url)"
				class="px-3 py-1 rounded border"
				:class="[
				link.active
					? 'bg-white text-green border-green'
					: 'bg-green text-white border-green hover:bg-opacity-90'
				]"
				v-html="link.label"
			/>
			<span v-else class="px-3 py-1 text-gray" v-html="link.label"></span>
		</template>
	</nav>
</template>

<script setup>
  	import { router } from '@inertiajs/vue3'

	const props = defineProps({
		links: {
			type: Array,
			required: true,
		},
	})

	function goTo(url) {
		router.visit(url, { preserveState: true, preserveScroll: true })
	}
</script>
