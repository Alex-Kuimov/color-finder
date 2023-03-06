<template>
    <div>
        <p v-if="Object.keys(items).length > 0" class="lead">
            <Preloader :preloader="preloader"></Preloader>
            А вот еще палеты:
        </p>
        <div class="pallet-wrap mb-6">
            <Preloader :preloader="preloader"></Preloader>
            <div class="pallet-item" v-for="item in items" :key="item.id">
                <div class="pallet-color" :style="'background:'+item[0]">
                    <div class="pallet-text" @click="action.copyColor(item[0])">{{ item[0] }}</div>
                </div>
                <div class="pallet-color" :style="'background:'+item[1]">
                    <div class="pallet-text" @click="action.copyColor(item[1])">{{ item[1] }}</div>
                </div>
                <div class="pallet-color" :style="'background:'+item[2]">
                    <div class="pallet-text" @click="action.copyColor(item[2])">{{ item[2] }}</div>
                </div>
                <div class="pallet-color" :style="'background:'+item[3]">
                    <div class="pallet-text" @click="action.copyColor(item[3])">{{ item[3] }}</div>
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