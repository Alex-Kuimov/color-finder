<template>
    <form class="search-form mb-4" @submit.prevent="action.getData()">
        <input 
            type="text" 
            class="mb-4 form-control pl-1 input-hex"
            :value="modelValue" 
            @input="$emit('update:modelValue', $event.target.value)"
        >

        <ColorInput 
            v-model="color"
            format="hex string" 
            disable-text-inputs
            @saturationInput="onChange"
        >
        </ColorInput>

        <button class="btn btn-find search-btn mt-4">
            <span>Подобать цвет</span>
            <svg v-if="!preloader" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
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
    data() {
        return {
            color: '',
        }
    },
    methods: {
        onChange() {
            this.$emit('update:modelValue', this.color);
        }
    },
    created() {
        this.color = this.modelValue;
    },
}
</script>