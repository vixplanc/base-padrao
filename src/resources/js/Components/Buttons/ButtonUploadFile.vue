<script setup>
import { router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    typeBtn: {
        type: Number,
        default: 1,
    },
    size: {
        type: Number,
        default: 26,
    }
})

const uploadImg = (arquivo) => {

const form = useForm({
        img: arquivo
    })

    form.post('http://127.0.0.1:8000/dashboard')

}

</script>


<template>
    <label class="cursor-pointer">

        <svg v-if="typeBtn === 1" class="text-vix-blue-100 hover:text-vix-blue-200 transitionBtnUpload"  xmlns="http://www.w3.org/2000/svg" :width="size" :height="size" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
        </svg>

        <div v-if="typeBtn === 2" class="flex gap-2 border rounded-md w-40 justify-center items-center border-vix-blue-100 text-vix-blue-100 hover:border-white hover:text-white hover:bg-vix-blue-100 transitionBtnUpload ">
            Enviar Arquivo
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>

        <input class="hidden" type="file" @input="uploadImg($event.target.files[0])" />
    </label>

</template>

<style>
    .transitionBtnUpload {
        transition: all 0.5s;
    }
</style>




