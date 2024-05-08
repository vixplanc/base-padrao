<script setup>
defineProps({
    value: {
        type: String,
    },
    color: {
        default: 'text-white',
        type: String,
    }
});
</script>

<template>
    <label class="block font-medium text-sm" :class="color">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
