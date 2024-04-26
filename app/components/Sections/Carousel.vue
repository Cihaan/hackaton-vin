<script setup lang="ts">
import LinkNav from "~/components/Atoms/LinkNav.vue";
import { ref } from 'vue'; // Import de ref pour créer une variable réactive

const items = [
  'https://www.intervin.fr/sites/default/files/inline-images/vin-champagne.jpg',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_blanc.jpg?v=1674750948',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_Rouge.jpg?v=1675077183'
];

// Création d'une variable réactive pour contrôler l'affichage de la section
const showSection = ref(false);
// Variable pour le titre de la section
const sectionTitle = ref("Intéressé par le procédé de vinification ?");

// Fonction pour basculer l'état de l'affichage
const toggleSection = () => {
  showSection.value = !showSection.value;
  // Modification du titre en fonction de l'état d'affichage
  if (showSection.value) {
    sectionTitle.value = "Procédés de la vinification";
  } else {
    sectionTitle.value = "Intéressé par le procédé de vinification ?";
  }
};
</script>

<template>
  <div>
    <!-- Bouton pour basculer l'affichage de la section -->
    <div class="container flex flex-row justify-between my-10">
        <h4 :class="{ 'noprint': !showSection }" class="text-wine-600 text-5xl font-bold">{{ sectionTitle }}</h4>
        <button @click="toggleSection"
      class="relative inline-flex items-center justify-center p-10 px-6 py-3 overflow-hidden font-medium bg-secondary-500 text-black-600 transition duration-300 ease-out border-2 border-primary-500 rounded-lg shadow-md group noprint">
      <span
          class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-primary-500 group-hover:translate-x-0 ease border-secondary-500">

        <img src="~/public/eye.png" alt="Icon" class="w-6 h-6">
      </span>
      <span
          class="absolute flex items-center justify-center w-full h-full text-black-500 transition-all duration-300 transform group-hover:translate-x-full ease">Cliquez ici</span>
      <span class="relative invisible">Cliquez ici</span>
    </button>
    </div>

    
    
    <!-- Section à afficher/cacher -->
    <section v-if="showSection" class="h-fit flex flex-col justify-center px-10 pb-5">
      
      <div class="container mx-auto">
        <UCarousel
          :items="items"
          :ui="{
            item: 'basis-full flex justify-center items-center',
            container: 'rounded-lg',
            indicators: {
              wrapper: 'relative bottom-0'
            }
          }"
          indicators
          arrows 
          class="w-full"
        >
          <template #default="{ item }">
            <img :src="item" width="80%" height="auto" draggable="false"> <!-- Responsive image -->
          </template>

          <template #indicator="{ onClick, page, active }">
            <UButton :label="String(page)" :variant="active ? 'solid' : 'outline'" size="2xs" class="rounded-full mt-0 min-w-6 justify-center" @click="onClick(page)" />
          </template>
        </UCarousel>
      </div>
    </section>
  </div>
</template>
