<script setup lang="ts">

import LinkNav from "~/components/Atoms/LinkNav.vue";
import Accueil from "~/components/Sections/Accueil.vue";
import Atelier from "~/components/Sections/Atelier.vue";
import Animateur from "~/components/Sections/Animateur.vue";
import Carousel from "~/components/Sections/Carousel.vue";

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
  <Carousel />

</template>

<style scoped></style>
