<template>
  <div x-data="{ open: false }" class="bg-secondary shadow-md border-b-4 border-primary noprint">
    <div class="container mx-auto flex justify-between items-center px-4">
      <NuxtLink to="/">
        <NuxtImg class="h-16 w-auto" src="img/logo.png" alt="Logo" />
      </NuxtLink>
      <button @click="open = !open" class="lg:hidden text-primary">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-6 h-6 hover:text-black"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
      </button>
      <div class="hidden lg:flex px-6">
        <ul class="lg:flex space-x-4 ">
          <li><LinkNav to="/">Accueil</LinkNav></li>
          <li><LinkNav to="/workshop" active="underline" >Ateliers</LinkNav></li>
          <li><LinkNav to="/administration" >Administration</LinkNav></li>
        </ul>
      </div>
    </div>
    <div v-show="open" class="lg:hidden">
      <ul class="bg-secondary text-end p-4">
        <li><LinkNav to="/" >Accueil</LinkNav></li>
        <li><LinkNav to="/workshop" >Ateliers</LinkNav></li>
        <li><LinkNav to="/administration">Administration</LinkNav></li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import LinkNav from "~/components/Atoms/LinkNav.vue";

const open = ref(false);


</script>

<style scoped>
.hover-underline::before {
  content: "";
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -2px;
  background-color: #000; /* Changez la couleur de l'underline au besoin */
  transition: width 1000s ease; /* Durée de l'animation */
}

.hover-underline:hover::before {
  width: 100%;
  right: 0; /* Commencez l'underline de la droite */
  left: auto; /* Réinitialisez la valeur de gauche */
}
</style>
