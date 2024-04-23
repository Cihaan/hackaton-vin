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

  <section class="h-screen flex flex-col justify-center">
    <div class="container mx-auto grid grid-cols-2 h-4/5  ">
      <div class="flex flex-col items-center gap-4">
        <div class="flex flex-col  gap-4 w-3/6 ">
          <h2 class="text-wine-600 text-4xl font-bold">Nos Ateliers</h2>
          <p class="text-wine-600 text-lg mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
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
      <div class="relative h-1/2">
        <img src="../public/img/atelier1.png" alt="degustation-vin" class="w-64 h-96 object-cover">
        <img src="../public/img/atelier2.png" alt="degustation-vin"
             class="w-64 h-96 object-cover absolute top-72 left-36">
      </div>
    </div>
  </section>
  <section class="animateur">
    <div class="flex pr-96 pt-10 pl-96">
      <div class="w-1/2 pr-36 mt-4">
        <p class="text-5xl">Animateur</p>
        <img src="../public/img/animateur.png" class="mt-10 max-w-max	mb-10" alt="bg max">
      </div>
      <div>
        <p class="text-2xl leading-relaxed mt-24">
          Plongez dans l'univers passionnant du vin avec notre hôte passionné, un connaisseur émérite désireux de
          partager sa fascination pour les vins de toute la France. À travers des dégustations soigneusement
          orchestrées, vous découvrirez un panorama des saveurs et des terroirs, des coteaux de Bordeaux aux vallées de
          la Loire.
        </p>
        <p class="text-2xl leading-relaxed mt-12">
          Que vous soyez novice ou amateur éclairé, chaque dégustation offre une expérience sensorielle enrichissante,
          où les vins sélectionnés avec soin révèlent les secrets des vignobles français. Rejoignez-nous pour une
          exploration vinicole captivante, où le plaisir de découvrir de nouveaux crus et de partager des moments
          conviviaux est aussi abondant que les grappes mûres à la vendange.
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
