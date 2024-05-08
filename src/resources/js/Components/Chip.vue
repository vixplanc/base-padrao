<script setup>
    const emit = defineEmits(['deleteChip'])

    const deleteChip = (role) => {
        emit('deleteChip', role);
    }

</script>

<template>

    <div class="flex justify-center items-center border rounded-full border-vix-green-200 w-10/12 px-1 mx-auto text-zinc-800 ">
            <slot/>
            <button @click.prevent="deleteChip" class="hover:opacity-80">
                <svg width="18" height="18"  xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>
            </button>
    </div>

</template>

<style>

</style>

