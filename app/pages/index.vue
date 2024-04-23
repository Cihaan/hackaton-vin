<script setup lang="ts">

</script>

<template>
  <section class="accueil">
    <div class="flex flex-col py-32 px-20 gap-24">
      <div>
        <h1 class="text-white text-7xl leading-tight"> Découverte et <br> Dégustation <br> des Vins </h1>
        <h3  class="text-white text-3xl mt-8">Un Voyage à travers les Saveurs</h3>
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

</template>

<style scoped>

.accueil {
  position: relative; /* Contains the pseudo-element */
  min-height: 700px; /* Matches the height of the pseudo-element */
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
