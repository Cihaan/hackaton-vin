<script setup lang="ts">

import LinkNav from "~/components/Atoms/LinkNav.vue";
</script>

<template>

  <header>
    <nav class="container flex items-center justify-between mx-auto" aria-label="Global">
      <div class="flex lg:flex-1">
        <NuxtLink to="/">
          <NuxtImg class="h-16 w-auto" src="img/logo.png" alt="Logo"/>
        </NuxtLink>
      </div>

      <div class="flex gap-4">

        <LinkNav to="/">
          Accueil
        </LinkNav>

        <LinkNav to="/workshop">
          Ateliers
        </LinkNav>

        <LinkNav to="/administration/list-workshop">
          Administration
        </LinkNav>

      </div>

    </nav>
  </header>

</template>

<style scoped>

</style>
