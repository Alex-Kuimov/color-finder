<template>
    <div class="row justify-content-start">
        <p class="lead" v-html="text"></p>
    </div>
</template>

<script>
export default {
    props: ['text'],
}
</script>