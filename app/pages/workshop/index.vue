<script setup lang="ts">
import {useWorkshopStore} from "~/store/WorkshopStore";

useWorkshopStore().getWorkShop()

</script>
<!--page liste de carde pour afficher les ateliers-->
<template>
  <div>
    <h1>Liste des ateliers</h1>
    <div v-if="useWorkshopStore().listWorkshop.length === 0">Aucun atelier disponible pour le moment.</div>
    <div v-else>
      <UCard v-for="workshop in useWorkshopStore().listWorkshop" :key="workshop.id">
        <template #header>
          <h2>{{ workshop.name }}</h2>
        </template>
        <div class="workshop-details">
          <p>Date: {{ workshop.date }}</p>
          <p>Limite de participants : {{ workshop.limit_drinker }}</p>
          <p>Thème : {{ workshop.theme }}</p>
          <!-- Ajoutez d'autres détails de l'atelier ici selon vos besoins -->
        </div>
      </UCard>
    </div>
  </div>
</template>
<style scoped>

</style>