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
  }]

</script>

<template>

  <section class="container mx-auto lg:px-0 px-10 mt-10 mb-10">
    <h1 class="text-wine-600 text-5xl py-10 font-bold lg:text-start text-center">Administration</h1>


    <UHorizontalNavigation class="bg-[#D9D9D9] mt-8 p-4 rounded-xl"  :ui="{ inactive: 'text-wine-500' , base : 'lg:text-sm text-[10px]' ,  icon: {base: 'lg:w-5 w-3 lg:h-5 h-3',},  }" :links="links" >

    </UHorizontalNavigation>

  </section>

</template>

<style scoped>

</style>