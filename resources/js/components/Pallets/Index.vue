<template>
    <div class="d-flex flex-column h-100">
        <Header></Header>
        <div class="container mt-4 mb-4">
            <Welcome :text="mainText"></Welcome>
            <Form v-model="color" :action="action" :preloader="preloader"></Form>
            <Items :action="action" :items="colors" :preloader="preloader" :text="colorsText"></Items>
            <Items :action="action" :items="pairs" :preloader="preloader" :text="pairsText"></Items>
            <Items :action="action" :items="pallets" :preloader="preloader" :text="palletsText"></Items>
            <None v-if="none"></None>
            <Notifications position="bottom right" />
        </div>
        <Footer></Footer>
    </div>    
</template>

<script>
    import ColorInput from 'vue-color-input';
    import Preloader from './Preloader.vue';
    import Header from './Header.vue';
    import Welcome from './Welcome.vue';
    import Items from './Items.vue';
    import Form from './Form.vue';
    import None from './None.vue';
    import Footer from './Footer.vue';
    import ColorMixin from './services/ColorMixin.js';
    import ActionsMixin from './services/ActionsMixin.js';
    import { data } from './storage/Data.js';

    export default {
        components: {
            ColorInput,
            Preloader,
            Header,
            Welcome,
            Items,
            Form,
            None,
            Footer,
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
