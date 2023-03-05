<template>
    <form class="search-form mb-4" @submit.prevent="action.getData()">
        <input type="text" v-model="color" class="mb-4 form-control pl-1 input-hex">
        <ColorInput 
            v-model="color" 
            format="hex string" 
            disable-text-inputs>
        </ColorInput>
        <button class="btn btn-warning search-btn mt-4">
            <span>Подобать цвет</span>
            <span v-if="preloader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        </button>
    </form>
</template>

<script>
import ColorInput from 'vue-color-input';
export default {
    components: {
        ColorInput,
    },
    props: ['action', 'preloader', 'modelValue'],
    emits: ['update:modelValue'],
}
</script>