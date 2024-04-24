<script setup lang="ts">

import LinkNav from "~/components/Atoms/LinkNav.vue";
import Accueil from "~/components/Sections/Accueil.vue";
import Atelier from "~/components/Sections/Atelier.vue";
import Animateur from "~/components/Sections/Animateur.vue";

const items = [
  'https://www.intervin.fr/sites/default/files/inline-images/vin-champagne.jpg',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_blanc.jpg?v=1674750948',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_Rouge.jpg?v=1675077183'
]
</script>

<template>

  <Accueil />
  <Atelier />
  <Animateur />
  <section class="h-fit flex flex-col justify-center">
    <h2 class="text-primary-500 text-5xl font-bold text-center mb-16 mt-16">Vinification du Vin</h2>
    <div class="container mx-auto h-4/5 ">
      <UCarousel v-slot="{ item }" :items="items" :ui="{ item: 'basis-full' }" arrows indicators   class="ml-24 mr-24 pl-24 pr-24">
        <img :src="item" width="1000" height="500" draggable="false">
      </UCarousel>
    </div>
  </section>






</template>

<style scoped></style>
