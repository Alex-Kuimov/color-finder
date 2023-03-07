<template>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-start">
            <p class="lead" v-html="mainText"></p>
        </div>

        <Form v-model="color" :action="action" :preloader="preloader"></Form>
 
        <Items :action="action" :items="colors" :preloader="preloader" :text="colorsText"></Items>
        <Items :action="action" :items="pairs" :preloader="preloader" :text="pairsText"></Items>
        <Items :action="action" :items="pallets" :preloader="preloader" :text="palletsText"></Items>

        <None v-if="none"></None>

        <Notifications position="bottom right" />
    </div>
</template>

<script>
    import ColorInput from 'vue-color-input';
    import Preloader from './Preloader.vue';
    import Items from './Items.vue';
    import Form from './Form.vue';
    import None from './None.vue';
    import ColorMixin from './services/ColorMixin.js';
    import ActionsMixin from './services/ActionsMixin.js';
    import { data } from './storage/Data.js';

    export default {
        components: {
            ColorInput,
            Preloader,
            Items,
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
