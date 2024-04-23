<script setup lang="ts">

</script>

<template>
  <section class="accueil">
    <div class="container mx-auto flex flex-col py-32 gap-24">
      <div>
        <h1 class="text-white text-7xl leading-tight"> Découverte et <br> Dégustation <br> des Vins </h1>
        <h3 class="text-white text-3xl mt-8">Un Voyage à travers les Saveurs</h3>
      </div>

      <UButton
          class="rounded-none w-1/5 h-14 border-2 border-secondary "
          color="primary"
          :trailing="false"
      >
        <span class="text-secondary-500 mx-auto text-xl">S'inscrire à un Atelier</span>
      </UButton>
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
