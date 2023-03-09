<script setup>
import { VueFinalModal } from "vue-final-modal";
</script>

<template>
    <VueFinalModal v-slot="{ close }" classes="modal-container" content-class="modal-content">
        <slot :close="close"></slot>
    </VueFinalModal>
</template>
