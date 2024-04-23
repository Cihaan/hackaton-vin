<script setup lang="ts">

</script>

<template>
  <section class="accueil">
    <div class="flex flex-col py-32 px-20 gap-24">
      <div>
        <h1 class="text-white text-7xl leading-tight"> Découverte et <br> Dégustation <br> des Vins </h1>
        <h3 class="text-white text-3xl mt-8">Un Voyage à travers les Saveurs</h3>
      </div>

      <UButton
          icon="i-heroicons-pencil-square"
          size="sm"
          class="w-52 border-2 border-white"
          color="primary"
          variant="solid"
          label="S'inscrire à un atelier"
          :trailing="false"
      />
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
