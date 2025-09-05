<template>
    <div class="p-6">
		<PageHeading :label="'Provider Profile Page - ' + provider.name" />

		<div class="p-4 border-blue bg-blue rounded-lg">
			<ProviderProfileCard :provider="provider" />
		</div>
        <div class="mt-4">
            <button
                @click="listingPage()"
                class="px-3 py-1 rounded border bg-green text-white border-green hover:bg-opacity-90"
                v-html="'Back to listing page'"
            />
        </div>
    </div>
</template>

<script setup>
  	import { router } from '@inertiajs/vue3'
  	import Pagination from '@/Components/Pagination.vue'
	import ProviderProfileCard from '@/Components/ProviderProfileCard.vue'
	import PageHeading from '@/Components/PageHeading.vue'

	const props = defineProps({
		provider: {
			type: Object,
			required: true,
		},
	})

	/**
	 * Listing page method
	 */
    function listingPage() {
        router.get('/');
    }
</script>
