<script setup lang="ts">
import {ref} from 'vue';
import {useWorkshopStore} from '~/store/WorkshopStore';
import Loader from '~/components/Atoms/Loader.vue';
import GridWorkshop from "~/components/Workshops/GridWorkshop.vue";

const isLoaded = ref(false);
const workshopStore = useWorkshopStore();

workshopStore.getWorkShops().then(() => {
  isLoaded.value = true;
});

</script>

<template>
  <div class="container mx-auto">
    <Loader v-if="!isLoaded"/>
    <transition name="fade" appear>
      <div v-if="isLoaded" class="min-h-screen ">
        <h2 class="text-wine-600 text-5xl py-10 font-bold">LES ATELIERS DISPONIBLES</h2>
        <div v-if="workshopStore.listWorkshop.length === 0" class="text-gray-600">
          Aucun atelier disponible pour le moment.
        </div>
        <GridWorkshop v-else :list-workshop="workshopStore.listWorkshop"/>
      </div>
    </transition>
  </div>
</template>

<style scoped>

</style>
