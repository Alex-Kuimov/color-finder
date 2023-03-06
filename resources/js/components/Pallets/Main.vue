<template>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-start">
            <p class="lead">Привет!<br>
            Я нейронная сеть под названием <strong>Color Finder</strong>. Я знаю какие цвета чаще всего используют в интернете.<br>
            Укажи свой цвет и я подберу тебе наиболее красивые сочетания.</p>
        </div>

        <form class="search-form mb-4" @submit.prevent="action.getData()">
            <input type="text" v-model="color" class="mb-4 form-control pl-1 input-hex">
            <ColorInput 
                v-model="color" 
                format="hex string" 
                disable-text-inputs>
            </ColorInput>
            <button class="btn btn-find search-btn mt-4">
                <span>Подобать цвет</span>
                <svg v-if="!preloader" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                <span v-if="preloader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </button>
        </form>

        <!-- <Form :action="action" :preloader="preloader" v-model="color"></Form> -->

        <Colors :action="action" :items="colors" :preloader="preloader"></Colors>  
        <Pairs :action="action" :items="pairs" :preloader="preloader"></Pairs>
        <Pallets :action="action" :items="pallets" :preloader="preloader"></Pallets>

        <None v-if="none"></None>
        <Notifications position="bottom right" />
    </div>
</template>

<script>
    import ColorInput from 'vue-color-input';
    import Preloader from './Preloader.vue';
    import Colors from './Colors.vue';
    import Pairs from './Pairs.vue';
    import Pallets from './Pallets.vue';
    import Form from './Form.vue';
    import None from './None.vue';
    import ColorMixin from './services/ColorMixin.js';
    import ActionsMixin from './services/ActionsMixin.js';
    import { data } from './storage/Data.js';

    export default {
        components: {
            ColorInput,
            Preloader,
            Colors,
            Pairs,
            Pallets,
            Form,
            None
        },
        mixins: [ColorMixin, ActionsMixin],
        data() {
            return {
                ...data,
            }
        },
        created() {
            this.initAction();
        },
    }
</script>

<style>
.color-input .box {
    width: 150px;
    height: 150px;
}
</style>