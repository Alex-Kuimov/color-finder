<template>
    <div v-if="Object.keys(items).length > 0">
        <div class="mb-4">
            <p class="lead">
                <Preloader :preloader="preloader"></Preloader>
                {{ text }}
            </p>
            <div class="pallet-wrap">
                <Preloader :preloader="preloader"></Preloader>
                <div  v-for="item in items" :key="item.id">
                    <div v-if="Array.isArray(item)" class="pallet-item">
                        <div class="pallet-color" v-for="color in item" :key="color.id" :style="'background:'+color">
                            <div class="pallet-text" @click="action.copyColor(color)">{{ color }}</div>
                        </div>
                    </div>
                    <div v-else class="pallet-item">
                        <div class="pallet-color" :style="'background:'+item">
                            <div class="pallet-text" @click="action.copyColor(item)">{{ item }}</div>
                        </div>
                    </div>      
                </div>
            </div>    
        </div>    
    </div>    
</template>

<script>
import Preloader from './Preloader.vue';
export default {
    props: ['items', 'preloader', 'text', 'action'],
        components: {
            Preloader,
        },
}
</script>