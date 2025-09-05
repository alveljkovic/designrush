<template>
    <div>
        <img v-if="provider.logo_path" :src="asset(provider.logo_path)" loading="lazy" :alt="provider.name" width="154" height="36" />
        <p class="text-white"><strong>{{ provider.name }}</strong></p>
        <p class="text-white mb-4 italic">{{ provider.category.name }}</p>
        <p class="text-white">{{ provider.short_description }}</p>
    </div>
</template>

<script setup>
    import { router } from '@inertiajs/vue3'

    const props = defineProps({
        provider: {
            type: Object,
            required: true,
        },
    })
</script>
