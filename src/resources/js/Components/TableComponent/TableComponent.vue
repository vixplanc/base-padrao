<script setup>
    import ButtonPage from '@/Components/TableComponent/ButtonPage.vue';

const props = defineProps({
    paginated: {
        type: Object,
        default: []
    },
    titleName: {
        type: Array,
        default: []
    },
    colorTitle: {
        type: String,
        default: 'transparent'
    },
    blockTable : {
        type: Boolean,
        default: false
    }
})
const emit = defineEmits(['filterPage'])

const filterPage = (url) => {
    emit('filterPage', url);
}

</script>
<template>
    <div class="w-full h-full relative">
        <div v-show="props.blockTable" class="absolute -top-3 -left-1 telaBlock bg-black/60 z-40 cursor-not-allowed rounded"></div>
        <div class="h-[50px]">
            <div @change="filterPage((`${props.paginated.path}?page=1`))" class="flex justify-around">
                <slot name="headerTable"></slot>
            </div>
        </div>
        <div class="cal-h overflow-y-auto">

            <table id="users" class="table table-striped" style="width:100%">
                <thead>
                    <tr :style="`background-color: ${colorTitle};`">
                        <th v-for="name in titleName" :key="name"> {{ name }} </th>
                    </tr>
                </thead>
                <tbody>
                    <slot name="tableBody" ></slot>
                </tbody>
            </table>
        </div>
        <div class="h-[40px] w-full flex justify-center items-center gap-2 mt-1">

            <ButtonPage v-if="props.paginated.first_page_url" @click.prevent="filterPage(props.paginated.first_page_url)" :dct="1" :typeBtn="2"></ButtonPage>
            <div v-for="(page,index) in props.paginated.links">
                <ButtonPage @click.prevent="filterPage(page.url)" :key="index + 'ant'" v-if='page.label == "Anterior"' :dct="1" :typeBtn="1" ></ButtonPage>
                <ButtonPage @click.prevent="filterPage(page.url)" :key="index + 'dep'" v-else-if="page.label == 'Proxima'" :dct="2" :typeBtn="1"></ButtonPage>
                <button :class="props.paginated.current_page == page.label ? 'text-vix-green-200': ''" v-else @click.prevent="filterPage(page.url)" :key="index" class="border border-black w-6 h-7 rounded-md">{{ page.label }}</button>
            </div>
            <ButtonPage v-if="props.paginated.last_page_url" @click.prevent="filterPage(props.paginated.last_page_url)" :dct="2" :typeBtn="2"></ButtonPage>
        </div>
    </div>
</template>
<style>
    .cal-h {
        height: calc(100% - 90px);
    }
    .loader-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 10px solid #555;
        border-top-color: #f8b26a;
        animation: loader-circle 1s linear infinite;
    }

    @keyframes loader-circle {
    0% {
        transform: rotate(0);
    }
    100% {
        transform: rotate(360deg);
    }
    }

    .telaBlock {
        width: calc(100% + 10px);
        height: calc(100% + 20px);
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
