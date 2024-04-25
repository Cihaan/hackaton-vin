<script setup lang="ts">

import LinkNav from "~/components/Atoms/LinkNav.vue";
import type {WorkshopType} from "~/types/WorkshopType";
import type {PropType} from "vue";

defineProps({
  workshop: Object as PropType<WorkshopType>
})
</script>

<template>

  <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
       class="mb-6 shadow-md rounded-md bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full"
       width="1216" height="640">
  <div class=" sm:ml-6 xl:ml-0">
    <h3 class="mb-1 text-slate-900 font-sans font-medium">
      <span class="mb-1 block text-sm leading-6 font-sans text-primary">Dégustation</span>
      {{ workshop.name }}
    </h3>
    <div class="prose prose-slate prose-sm text-slate-600">
      <p class="break-all font-sans"> {{ workshop.description }}</p>

      <p class="font-medium">{{ workshop.limitDrinker }} place(s) restante(s)</p>
      <p class="text-lg font-medium text-end font-sans">{{ workshop.price }}€/pers</p>
    </div>
    <LinkNav :to="`workshop/detail/${workshop.id}`"
        class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 mt-6"
        >Voir le détail<span class="sr-only">, Completely unstyled, fully accessible UI components</span>
      <svg class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400"
           width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M0 0L3 3L0 6"></path>
      </svg>
    </LinkNav>

  </div>
</template>

<style scoped>

</style>