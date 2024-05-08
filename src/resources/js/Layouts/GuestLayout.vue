<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import Img from '/public/storage/img/bus.png'

</script>

<template>
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-600 bg-cover bg-center" :style="`background-image: url(${Img})`">
        <div class="absolute inset-0 w-full h-full bg-[#1414146e]"></div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg z-10 backdrop-blur bg-white/20 border"
        >
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500 mx-auto" />
            </Link>
            <slot />
        </div>
    </div>
</template>
