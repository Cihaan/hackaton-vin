<script setup lang="ts">
import Accueil from "~/components/Sections/Accueil.vue";
import Atelier from "~/components/Sections/Atelier.vue";
import Animateur from "~/components/Sections/Animateur.vue";
</script>


<template>

  <LayoutsNavbar />


  <div>
    <Accueil />
    <Atelier />
    <Animateur />
  </div>


  <LayoutsFooter />
</template>
