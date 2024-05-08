<script setup>

    const props = defineProps({
        typeBtn: Number,
        dct: Number,
    })

</script>

<template>
    <button class="border border-black w-6 h-7 rounded-md flex items-center justify-center">
        <div v-if="dct === 1">
            <svg  v-if="typeBtn === 1" fill="#000000" class="w-[13px]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330.002 330.002" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_227_" d="M233.25,306.001L127.5,165.005L233.25,24.001c4.971-6.628,3.627-16.03-3-21c-6.627-4.971-16.03-3.626-21,3 L96.75,156.005c-4,5.333-4,12.667,0,18l112.5,149.996c2.947,3.93,7.451,6.001,12.012,6.001c3.131,0,6.29-0.978,8.988-3.001 C236.878,322.03,238.221,312.628,233.25,306.001z"></path> </g>
            </svg>
            <svg v-if="typeBtn === 2" fill="#000000" class="w-[14px]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_106_"> <path id="XMLID_107_" d="M51.213,165.004L190.607,25.607c5.857-5.858,5.857-15.355-0.001-21.213 c-5.857-5.858-15.355-5.858-21.213,0.001l-150,150.004C16.58,157.211,15,161.026,15,165.004c0,3.979,1.581,7.794,4.394,10.607 l150,149.996C172.322,328.536,176.161,330,180,330s7.678-1.464,10.607-4.394c5.857-5.858,5.857-15.355-0.001-21.213L51.213,165.004 z"></path> <path id="XMLID_108_" d="M171.213,165.004L310.607,25.607c5.858-5.858,5.858-15.355,0-21.213 c-5.857-5.858-15.355-5.858-21.213,0.001l-150,150.004c-2.813,2.813-4.393,6.628-4.393,10.606c0,3.979,1.581,7.794,4.394,10.607 l150,149.996C292.322,328.536,296.161,330,300,330c3.839,0,7.678-1.464,10.607-4.394c5.858-5.858,5.858-15.355,0-21.213 L171.213,165.004z"></path> </g> </g>
            </svg>
        </div>
        <div v-if="dct === 2">
            <svg v-if="typeBtn === 1" fill="#000000" class="w-[13px]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 C255,161.018,253.42,157.202,250.606,154.389z"></path> </g>
            </svg>

            <svg v-if="typeBtn === 2" fill="#000000" class="w-[14px]" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_103_"> <path id="XMLID_104_" d="M310.607,154.391l-150-149.997c-5.857-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0,21.213l139.393,139.39L139.394,304.394c-5.857,5.858-5.857,15.355,0,21.213 c2.929,2.929,6.768,4.393,10.606,4.393s7.678-1.464,10.607-4.394l150-150.003c2.813-2.813,4.393-6.628,4.393-10.606 C315,161.019,313.42,157.204,310.607,154.391z"></path> <path id="XMLID_105_" d="M195.001,164.996c0-3.979-1.581-7.794-4.394-10.607L40.606,4.393c-5.858-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0.001,21.213l139.394,139.39L19.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 C22.322,328.536,26.161,330,30,330s7.678-1.464,10.607-4.394l150.001-150.004C193.42,172.79,195.001,168.974,195.001,164.996z"></path> </g> </g>
            </svg>
        </div>
    </button>

</template>
