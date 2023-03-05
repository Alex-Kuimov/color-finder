<template>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-start">
            <p class="lead">Привет!<br>
            Я нейронная сеть под названием <strong>Color Finder</strong>. Я знаю какие цвета чаще всего используют в интренете.<br>
            Укажи свой цвет и я подберу тебе наиболее красивые сочетания.</p>
        </div>

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

        <!-- <Form :action="action" :preloader="preloader" v-model="color"></Form> -->

        <None v-if="none"></None>
        <Colors :items="colors" :preloader="preloader"></Colors>  
        <Pairs :items="pairs" :preloader="preloader"></Pairs>
        <Pallets :items="pallets" :preloader="preloader"></Pallets>
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
    import ColorMixin from './services/ColorMixin';
    import ActionsMixin from './services/ActionsMixin';
    import { data } from './storage/Data';

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