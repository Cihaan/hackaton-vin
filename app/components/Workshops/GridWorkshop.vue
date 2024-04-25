<script setup lang="ts">

import CardWorkshop from "~/components/Atoms/CardWorkshop.vue";
import type {WorkshopType} from "~/types/WorkshopType";
import type {PropType} from "vue";
defineProps({
  listWorkshop: Array as PropType<WorkshopType[]>,
})
</script>

<template>
  <ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start"
        v-for="workshop in listWorkshop" :key="workshop.id">
      <CardWorkshop :workshop="workshop"/>
    </li>
  </ul>
</template>

<style scoped>

</style>