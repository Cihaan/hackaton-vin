<script setup lang="ts">

import LinkNav from "~/components/Atoms/LinkNav.vue";
const items = [
  'https://www.intervin.fr/sites/default/files/inline-images/vin-champagne.jpg',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_blanc.jpg?v=1674750948',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_Rouge.jpg?v=1675077183'
]
</script>

<template>
  <section class="accueil">
    <div class="container mx-auto flex flex-col py-32 gap-24">
      <div>
        <h1 class="text-secondary-500 text-7xl leading-tight"> Découverte et <br> Dégustation <br> des Vins </h1>
        <h3 class="text-secondary-500 text-3xl mt-8">Un Voyage à travers les Saveurs</h3>
      </div>
      <LinkNav to="/workshop" class=" w-1/5 h-14">
        <span
            class=" border-2 border-secondary-500 bg-wine-100  hover:bg-secondary-500  text-secondary-500 w-full h-full hover:text-wine-600 text-secondary-500 flex items-center justify-center text-xl">S'inscrire à un Atelier</span>
      </LinkNav>
    </div>
  </section>

  <section class="h-[750px] flex flex-col justify-center">
    <div class="container mx-auto grid grid-cols-2 h-4/5  ">
      <div class="flex flex-col items-center gap-4">
        <div class="flex flex-col  gap-4 w-3/6 ">
          <h2 class="text-wine-600 text-5xl font-bold">ATELIER</h2>
          <p class="text-black text-lg mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua</p>

          <LinkNav to="/workshop" class=" w-4/5 h-14">
        <span
            class=" border-2 border-wine-600 bg-secondary-50  hover:bg-wine-600  text-wine-600 w-full h-full hover:text-secondary-500 flex items-center justify-center text-xl">S'inscrire à un Atelier</span>
          </LinkNav>
        </div>

      </div>
      <div class="relative h-1/2 ps-20">
        <img src="../public/img/atelier1.png" alt="degustation-vin" class="w-64 h-96 object-cover">
        <img src="../public/img/atelier2.png" alt="degustation-vin"
             class="w-64 h-96 object-cover absolute top-72 left-60">
      </div>
    </div>
  </section>
  <section class="h-fit flex flex-col justify-center animateur">
    <div class="container mx-auto grid grid-cols-2 h-4/5  ">
      <div class="flex flex-col items-center h-full gap-4">
        <div class="flex flex-col  h-full gap-4 w-3/6 ">
          <h2 class="text-secondary-500 text-5xl font-bold">ANIMATEUR</h2>
          <img src="../public/img/animateur.png" class="mt-10 w-96   object-cover max-w-max" alt="bg max">
        </div>
      </div>
      <div class="flex flex-col gap-6 h-1/2 w-5/6 mt-24">
        <p class="text-lg leading-relaxed">
          Passionné par tous types de Savoirs : Spatial, Mathématiques, Physique, Informatique, Intelligence
          Artificielle, Oenologie…

        </p>
        <p class="text-lg leading-relaxed">

          Ma pratique : Faire (re)découvrir les Sciences sous de nouveaux angles (historiques, humains, ludiques, ...)
          et lier celles-ci à l'Actualité et au Monde d'aujourd'hui et de demain. L'évolution rapide des IA (Midjourney,
          Dall-e, Chat GPT, Avia, Stable Diffusion,...) en est un parfait exemple et se trouve au coeur de mes
          différents cours pour illustrer l'interaction entre Connaissances et Applications pratiques.

        </p>
        <p class="text-lg leading-relaxed ">
          MOOCS & CERTIFICATIONS :
          - Défis et enjeux de la Cybersécurité (Université Bretagne Sud) Score 84 %
          - Exercer son esprit critique : données et raisonnements fallacieux Score 116 % ;-)
          - La science moderne de la Renaissance aux Lumières (Université Paris 1 Panthéon Sorbonne) Score 86 %
          - Deep Learning (CNAM) Score 78 %
          - Introduction a la statistique par R (Université Paris Sud) Score 96 %
          - La Science Fiction : (Université d'Artois) Score 96 %
        </p>
      </div>
    </div>
  </section>

  <section class="h-fit flex flex-col justify-center">
    <h2 class="text-secondary-500 text-5xl font-bold text-center">Vinification du Vin</h2>
    <div class="container mx-auto grid grid-cols-2 h-4/5">
<!--      <div class="flex flex-col items-center h-full gap-4">-->
<!--        <img src="../public/img/Vinification_-_Vin_Rouge.webp" class="mt-10 w-96 object-cover max-w-max " alt="bg max">-->
<!--        <div class="flex flex-col h-full gap-4 w-3/6">-->
<!--          <img src="../public/img/Vinification_-_Vin_blanc.webp" class="mt-10 w-96 object-cover max-w-max" alt="bg max">-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="flex flex-col items-center h-full gap-4">-->
<!--        <div class="flex flex-col h-full gap-4 w-3/6">-->
<!--          <img src="../public/img/vin-champagne.jpg" class="mt-36 w-96 object-cover max-w-max" alt="bg max"> &lt;!&ndash; Augmentation de la marge pour déplacer l'image vers le bas &ndash;&gt;-->
<!--        </div>-->
<!--      </div>-->
      <UCarousel v-slot="{ item }" :items="items">
        <img :src="item" width="1200" height="800" draggable="false">
      </UCarousel>
    </div>
  </section>






</template>

<style scoped>

.accueil {
  position: relative; /* Contains the pseudo-element */
  min-height: 700px; /* Matches the height of the pseudo-element */
}

.animateur {
  position: relative; /* Contains the pseudo-element */
  min-height: 700px; /* Matches the height of the pseudo-element */
  background-color: #BC313E;
  color: white;

}

.accueil::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 700px;
  background-image: url("../public/img/background-vin.png");
  background-size: cover;
  background-position: center;
  z-index: -1;
}

.second-section {
  /* Additional styling as needed */
}
</style>
