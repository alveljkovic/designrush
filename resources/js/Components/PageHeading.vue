<template>
    <h1 class="text-blue text-2xl font-bold mb-4">{{ label }}</h1>
</template>

<script setup>
    const props = defineProps({
        label: {
            type: String,
            required: true,
        },
    })
</script>
