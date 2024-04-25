<script setup lang="ts">

import NavAdministration from "~/components/Administrations/NavAdministration.vue";
import {useWorkshopStore} from '~/store/WorkshopStore';

const workshopStore = useWorkshopStore();
const events = ref<any>(null)
const isLoading = ref(true);

onMounted(async () => {
  await workshopStore.getWorkShops();
  events.value = workshopStore.listWorkshop.map((ws) => {
    console.log("ici", workshopStore.listWorkshop);
    return {
      title: ws.name,
      start: ws.date,
      // end: ws.end,
      // color: new Date(ws.end) < new Date() ? 'red' : 'green',
    }
  })

  isLoading.value = false;
});

definePageMeta({
  requiresAuth: true,
  middleware: 'guard-global'
})

</script>

<template>
  <NavAdministration />

  <UContainer class="pb-12">
    <Calendar v-if="!isLoading" :workshop-events="events" />
  </UContainer>
</template>

<style scoped>

</style>