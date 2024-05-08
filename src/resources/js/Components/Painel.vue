<script setup>

</script>


<template>
    <div class="w-full sm:h-[80vh] flex flex-col shadow-md shadow-[#55555580] border rounded-md p-2 gap-1">
        <div class="w-full h-14 flex items-center gap-1">
            <slot name="header"></slot>
        </div>
        <div class="flex flex-col sm:flex-row h-full max-h-[60vh] w-full gap-1">
            <div class="sm:w-1/3 h-full border rounded-md shadow-sm shadow-[#252525cb] p-2">
                <slot name="tools"></slot>
            </div>
            <div class="sm:w-2/3 h-full max-h-[320px] sm:max-h-full border rounded-md shadow-sm shadow-[#252525cb] px-2 py-4">
                <slot name="items"></slot>

            </div>
        </div>
        <div class="w-full h-14 flex justify-end items-center p-1 gap-2">
            <slot name="footer"></slot>
        </div>
    </div>
</template>

<style>

</style>


