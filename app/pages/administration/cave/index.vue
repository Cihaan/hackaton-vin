<script setup lang="ts">
const links = [
  {
    label: 'Liste des ateliers',
    icon: 'i-heroicons-list-bullet-16-solid',
    to: '/administration/list-workshop'
  },{
  label: 'Calendrier',
  icon: 'i-heroicons-calendar-days',
  to: '/getting-started/installation'
}, {
  label: 'Liste d\'attentes',
  icon: 'i-heroicons-arrow-small-right',
  to: '/components/command-palette'
}
, {
  label: 'Cave à vin',
  icon: 'i-heroicons-building-storefront-solid',
  to: '/components/command-palette'
}
  ]

definePageMeta({
  requiresAuth: true,
  middleware: 'guard-global'
})

</script>

<template>

  <section class="container mx-20 mt-10 mb-10">
    <h1 class="text-wine-500 text-3xl font-bold">Administration</h1>


    <UHorizontalNavigation class="bg-[#D9D9D9] mt-8 p-4 rounded-xl"  :ui="{ inactive: 'text-wine-500 ' }" :links="links" />

  </section>



</template>

<style scoped>

</style>