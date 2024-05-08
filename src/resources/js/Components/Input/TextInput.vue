<script setup>
    import { onMounted, ref } from 'vue';

    const props = defineProps({
        name: String,
    })

    // const emit = defineEmits(['update:modelValue'])

    const model = defineModel({
        type: String,
        required: false,
    })

    const input = ref(null);

defineExpose({ focus: () => input.value.focus() });

</script>
<template>
    <label class="flex rounded-md h-10 relative">
        <div class="div-float">
            <p class="text-float">{{props.name}}</p>
        </div>
        <span class="span-float"></span>
        <input type="text" v-model="model" ref="input" class="rounded-md h-full input-float">

    </label>
</template>

<style>
    .div-float {
        position: absolute;
        background: white;
        padding: 0 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 6px;
        top: -1px;
        left: 8px;

    }
    .text-float {
        transform: translate(0, 0px);
    }
    .span-float {
        display: block;
        width: 20px;
        height: 20px;
        position: absolute;
        top: 10px;
        left: 0px;
        background: black;
        height: 10px;
        z-index: -1;

    }

</style>
