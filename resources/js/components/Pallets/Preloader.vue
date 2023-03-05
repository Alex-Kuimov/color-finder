<template>
    <div v-if="preloader" class="pallet-loader"></div>
</template>
<script>
export default {
    props: ['preloader'],
}
</script>