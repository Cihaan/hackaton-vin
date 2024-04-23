<script setup lang="ts">

import LinkNav from "~/components/Atoms/LinkNav.vue";
</script>

<template>

  <header>
    <nav class="flex items-center justify-between py-6 px-32" aria-label="Global">
      <div class="flex lg:flex-1">
        <NuxtLink to="/" class="-m-1.5 p-1.5">
          <NuxtImg class="h-16 w-auto" src="img/logo.png" alt="Logo" />
        </NuxtLink>
      </div>

      <div class="flex gap-4">

        <LinkNav to="/accueil">
          Accueil
        </LinkNav>

        <LinkNav to="/accueil">
          Ateliers
        </LinkNav>

        <LinkNav to="/accueil">
          Administration
        </LinkNav>

      </div>

    </nav>
  </header>

</template>

<style scoped>

</style>