<script setup lang="ts">

const props = defineProps<{
  to: string
}>()

</script>

<template>

  <nuxt-link class="text-wine-600 font-bold" :to="to">
    <slot />
  </nuxt-link>

</template>

<style scoped>

</style>