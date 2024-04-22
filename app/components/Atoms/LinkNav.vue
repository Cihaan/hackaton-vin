<script setup lang="ts">

const props = defineProps<{
  to: string
}>()

</script>

<template>

  <nuxt-link class="text-red-wine-500 font-bold" :to="to">
    <slot />
  </nuxt-link>

</template>

<style scoped>

</style>