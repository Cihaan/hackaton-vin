<script setup lang="ts">

import NavAdministration from "~/components/Administrations/NavAdministration.vue";
import {useWorkshopStore} from '~/store/WorkshopStore';
import Loader from '~/components/Atoms/Loader.vue';

const workshopStore = useWorkshopStore();
const events = ref<any>(null)
const isLoading = ref(true);

onMounted(async () => {
  await workshopStore.getWorkShops();
  events.value = workshopStore.listWorkshop.map((ws) => {
    return {
      title: ws.name,
      start: ws.date,
      end_date: ws.end_date,
      color: new Date(ws.end_date) < new Date() ? 'red' : 'green',
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
  <Loader v-if="isLoading"/>
  <transition name="fade" appear>
    <div v-if="!isLoading">
      <NavAdministration />

      <UContainer class="pb-12">
        <Calendar v-if="!isLoading" :workshop-events="events" />
      </UContainer>
    </div>

  </transition>
</template>

<style scoped>

</style>