<script setup lang="ts">
import {ref} from 'vue';
import {useWorkshopStore} from '~/store/WorkshopStore';
import Loader from '~/components/Atoms/Loader.vue';

const isLoaded = ref(false);
const workshopStore = useWorkshopStore();

workshopStore.getWorkShop().then(() => {
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
        <ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8" v-else>
          <li class="relative flex flex-col sm:flex-row xl:flex-col items-start"
              v-for="workshop in workshopStore.listWorkshop" :key="workshop.id">
            <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
                 class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full"
                 width="1216" height="640">
            <div class=" sm:ml-6 xl:ml-0">
              <h3 class="mb-1 text-slate-900 font-sans font-medium">
                <span class="mb-1 block text-sm leading-6 font-sans text-primary">Dégustation</span>
                {{ workshop.name }}
              </h3>
              <div class="prose prose-slate prose-sm text-slate-600">
                <p class="break-all font-sans">{{ workshop.description }}</p>
                <div class="flex flex-wrap gap-2">
                  <UBadge class=" border-2 border-primary" color="secondary">
                    <span class="text-wine-600 text-center font-sans">{{ workshop.theme }}</span>
                  </UBadge>
                  <UBadge class=" border-2 border-primary" color="secondary">
                    <span class="text-wine-600 font-sans">{{ workshop.theme }}</span>
                  </UBadge>
                  <UBadge class=" border-2 border-primary" color="secondary">
                    <span class="text-wine-600 font-sans">{{ workshop.theme }}</span>
                  </UBadge>
                </div>
                <p class="font-medium">{{ workshop.limitDrinker }} place(s) restante(s)</p>
                <p class="text-lg font-medium text-end font-sans">{{ workshop.price }}€/pers</p>
              </div>

              <a
                  class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 mt-6"
                  href="">Learn
                more<span class="sr-only">, Completely unstyled, fully accessible UI components</span>
                <svg class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400"
                     width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                  <path d="M0 0L3 3L0 6"></path>
                </svg>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </transition>
  </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.8s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
