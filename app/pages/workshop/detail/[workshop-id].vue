<script setup lang="ts">
import type {WorkshopType} from "~/types/WorkshopType";
import {ref} from 'vue';
import {useWorkshopStore} from '~/store/WorkshopStore';
import Loader from '~/components/Atoms/Loader.vue';

const route = useRoute()

// When accessing /posts/1, route.params.id will be 1
console.log(route.params.workshopid)
//    async function getWorkShop(id: string | string[]) {
// const {
//   data,
//   pending,
//   error,
//   refresh
// } = await useFetch<WorkshopType>('http://127.0.0.1:8000/api/workshops/' + id, {})
// if (data.value) {
//   // @ts-ignore
//   return data.value
// }
//
// return null
// }

const isLoaded = ref(false);
const workshopStore = useWorkshopStore();
let workshop = ref<WorkshopType | null>(null);
workshopStore.getWorkShop(route.params.workshopid).then(() => {
  isLoaded.value = true;
  workshop = workshopStore.workshopDetail
});

</script>

<template>
  <div class="container mx-auto">
    <Loader v-if="!isLoaded"/>
    <transition name="fade" appear>
      <!--      Découverte et Dégustation des Vins
      Un Voyage à travers les Saveurs
      Rejoignez-nous pour un atelier exceptionnel de dégustation de vins dans un cadre historique et
      enchanteur.
      Au cours de cet événement de deux heures trente, vous serez guidé par les principes de la
      prestigieuse formation Wine and Spirit Education Trust (WSET).
      Découvrez les secrets des vins de diverses régions, que ce soit les nuances délicates des blancs, la
      profondeur des rouges, ou l'unicité des spécialités régionales.
      Chaque session offre une palette unique de six vins soigneusement sélectionnés pour enrichir
      votre expérience et éveiller vos sens.
      Vous perfectionnerez votre aptitude à identifier les arômes, les saveurs et à caractériser un vin en
      utilisant un vocabulaire précis et adapté.
      Différents thèmes vous sont proposés :
      Ma Première Dégustation : Tour de France
      Rouges Passion : Éclats et Arômes des Vins Rouges
      Les Trésors du Rhône : Un Parcours Épicurien
      Splendeurs de la Bourgogne : Éloge des Terroirs
      Bordeaux, Terre de Vignes : Une Palette de Saveurs
      Participation : 35 € par personne
      Comprenant la dégustation des vins et des planches apéritives
      Atelier limité à 14 personnes
      -->
      <div v-if="isLoaded" class="min-h-screen ">
        <!--        je rajoute une baniere-->
        <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
             class=" shadow-md rounded-md bg-slate-50 w-full h-64 my-6 object-cover "
        >
        <h1 class="mb-1 text-3xl  text-wine-600 font-sans font-medium">
          {{ workshop.name }}
        </h1>

        <p class="font-medium">Atelier limité à {{ workshop.limitDrinker }} personnes</p>
        <p class="text-lg font-medium text-end font-sans">Participation : {{ workshop.price }}€ par personnes</p>
        <p class="break-all font-sans pt-6">{{ workshop.description }}</p>
        <h3 class="text-wine-600 text-2xl font-bold pt-6">
          Différents thèmes vous sont proposés :
        </h3>
        <ul class="list-disc list-inside">
          <li v-for=" (theme, index) in workshop.theme" :key="index">
            {{ theme }}
          </li>
        </ul>
      </div>
    </transition>
  </div>
</template>

<style scoped>

</style>