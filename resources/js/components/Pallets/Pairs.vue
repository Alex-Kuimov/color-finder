<template>
    <div>
        <p v-if="Object.keys(items).length > 0" class="lead">
            <Preloader :preloader="preloader"></Preloader>
            Попробуй вот эти сочетания:
        </p>
        <div class="pallet-wrap mb-4">
            <Preloader :preloader="preloader"></Preloader>
            <div class="pallet-item" v-for="item in items" :key="item.id">
                <div class="pallet-color" :style="'background:'+item[0]">
                    <div class="pallet-text" @click="action.copyColor(item[0])">{{ item[0] }}</div>
                </div>
                <div class="pallet-color" :style="'background:'+item[1]">
                    <div class="pallet-text" @click="action.copyColor(item[1])">{{ item[1] }}</div>
                </div>
            </div>
        </div>    
    </div>    
</template>

<script>
import Preloader from './Preloader.vue';
export default {
    props: ['items', 'preloader', 'action'],
        components: {
            Preloader,
        },
}
</script>