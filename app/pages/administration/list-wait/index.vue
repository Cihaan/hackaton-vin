<script setup lang="ts">

import NavAdministration from "~/components/Administrations/NavAdministration.vue";

definePageMeta({
  requiresAuth: true,
  middleware: 'guard-global'
})

</script>

<template>
  <NavAdministration />
</template>

<style scoped>

</style>