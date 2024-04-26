<script setup lang="ts">

import LinkNav from "~/components/Atoms/LinkNav.vue";
import type {WorkshopType} from "~/types/WorkshopType";
import type {PropType} from "vue";
import DatePicker from "~/components/Atoms/UseDatePicker.vue";

defineProps({
  workshop: Object as PropType<WorkshopType>
})
</script>

<template>
  <div class=" p-4 shadow-lg rounded-md ">
    <img :src="workshop?.banner" alt=""
         class="mb-6 shadow-md rounded-md bg-slate-50 w-full  sm:mb-0 xl:mb-6 h-56 object-cover"
         >
    <div class=" sm:ml-6 xl:ml-0 ">
      <h3 class="mb-2 text-slate-900 font-sans font-medium ">
        <span class="mb-1 block text-sm leading-6 font-sans text-primary">Dégustation</span>
        {{ workshop.name }}
      </h3>
      <UFormGroup  name="date" >
        <DatePicker :disabled="true" :date="new Date(workshop.date)" />
      </UFormGroup>
      <div class="prose prose-slate prose-sm text-slate-600 mt-2  ">
        <p class="break-all font-sans min-h-32 w-80"> {{ workshop.description }}</p>

        <p class="font-medium"> Atelier limité à {{ workshop.limitDrinker }} personnes</p>
        <p class="text-lg font-medium text-end font-sans">{{ workshop.price }}€/pers</p>
      </div>
      <LinkNav :to="`workshop/detail/${workshop.id}`"
          class="relative inline-flex items-center justify-center p-2 px-6 py-2 overflow-hidden font-medium bg-secondary-500 text-black-600 transition duration-300 ease-out border-2 border-primary-500 rounded-lg shadow-md group noprint">
        <span
            class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-primary-500 group-hover:translate-x-0 ease border-secondary-500">

          <img src="~/public/wine.png" alt="Icon" class="w-6 h-6">
        </span>
        <span
            class="absolute flex items-center justify-center w-full h-full text-black-500 transition-all duration-300 transform group-hover:translate-x-full ease">Voir le détail</span>
            <span class="relative invisible">Voir le détail</span>
      </LinkNav>

    </div>
  </div>
</template>

<style scoped>

</style>