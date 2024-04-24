<script setup lang="ts">

const props = defineProps<{
  to: string
}>()

</script>

<template>

  <nuxt-link class=" text-primary text-lg font-bold transform px-4 py-2 hover:underline rounded-lg" :to="to">
    <slot />
  </nuxt-link>

</template>

<style scoped>
  .router-link-active {
    @apply underline underline-offset-2 ;
  }
  .router-link-active:hover {
    @apply underline underline-offset-2;
  }
</style>