<script setup lang="ts">
import LinkNav from "~/components/Atoms/LinkNav.vue";

const items = [
  'https://www.intervin.fr/sites/default/files/inline-images/vin-champagne.jpg',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_blanc.jpg?v=1674750948',
  'https://www.aveine.com/cdn/shop/files/Vinification_-_Vin_Rouge.jpg?v=1675077183'
]
</script>

<template>
  <section class="h-fit flex flex-col justify-center p-10">
    <div class="container">
      <h2 class="items-start text-primary-500 text-5xl font-bold">Vinification du Vin</h2>
    </div>
    <div class="container mx-auto">
      <UCarousel
        :items="items"
        :ui="{
          item: 'basis-full flex justify-center items-center',
          container: 'rounded-lg',
          indicators: {
            wrapper: 'relative bottom-0'
          }
        }"
        indicators
        arrows 
        class="w-full"
      >
        <template #default="{ item }">
          <img :src="item" width="80%" height="auto" draggable="false"> <!-- Responsive image -->
        </template>

        <template #indicator="{ onClick, page, active }">
          <UButton :label="String(page)" :variant="active ? 'solid' : 'outline'" size="2xs" class="rounded-full mt-5 min-w-6 justify-center" @click="onClick(page)" />
        </template>
      </UCarousel>
    </div>
  </section>
</template>
