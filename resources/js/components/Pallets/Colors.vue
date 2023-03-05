<template>
    <div>
        <p v-if="Object.keys(items).length > 0" class="lead">
            <Preloader :preloader="preloader"></Preloader>
            Твой цвет красивый, но человеки чаще всего используют вот эти:
        </p>
        <div class="pallet-wrap mb-4">
            <Preloader :preloader="preloader"></Preloader>
            <div class="pallet-item" v-for="item in items" :key="item.id">
                <div class="pallet-color" :style="'background:'+item">
                    <div class="pallet-text">
                        {{ item }}
                    </div>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
import Preloader from './Preloader.vue';
export default {
    props: ['items', 'preloader'],
        components: {
            Preloader,
        },
}
</script>