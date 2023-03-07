<template>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-start">
            <p class="lead">Привет!<br>
            Я нейронная сеть под названием <strong>Color Finder</strong>. Я знаю какие цвета чаще всего используют в интернете.<br>
            Укажи свой цвет и я подберу тебе наиболее красивые сочетания.</p>
        </div>

        <Form v-model="color" :action="action" :preloader="preloader"></Form>

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