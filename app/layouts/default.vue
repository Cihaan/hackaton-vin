<script setup lang="ts">
</script>


<template>

  <div class="mx-40 ">
    <section class="relative w-full">
      <div class="absolute top-0 inset-x-0 h-64 flex items-start">
        <div
            class="h-24 w-2/3 bg-gradient-to-br from-venice-blue-500 opacity-20 blur-2xl dark:from-[#570cac] dark:invisible dark:opacity-40">
        </div>
        <div
            class="h-20 w-3/5 bg-gradient-to-r from-venice-blue-500 opacity-40 blur-2xl dark:from-[#670ccf] dark:opacity-40">
        </div>
      </div>
      <div class="w-full px-5 sm:px-8 md:px-12 lg:px-8 max-w-screen-lg lg:max-w-screen-xl mx-auto " :class="className">
        <OrganismsNavbar />
      </div>

    </section>

    <div class="mt-10">
      <slot />
    </div>


  </div>

</template>

<style scoped>

</style>