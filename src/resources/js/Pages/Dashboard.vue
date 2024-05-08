<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ButtonUploadFile from '@/Components/Buttons/ButtonUploadFile.vue'
import { Head, router, useForm } from '@inertiajs/vue3';
import { ref, watchEffect } from 'vue';
import flasher from "@flasher/flasher";

let props = defineProps({
        flash: {
            type: Object,
            default: {},
        }
    });

    window.flasher = flasher;

    watchEffect(() => {
        flasher.render(props.flash.message)
    })

</script>



<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout  @closeInfoView="teste">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template> -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
