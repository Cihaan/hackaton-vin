<template>
  <section class="accueil px-6 h-screen bg-cover bg-center bg-no-repeat bg-[url('~/public/img/background-vin.png')]">
    <div class="container mx-auto flex flex-col justify-center py-16 lg:py-32 gap-8 lg:gap-24">
      <div class="text-center lg:text-left">
        <h1 class="text-white text-4xl lg:text-7xl leading-tight mt-44">Découverte et Dégustation des Vins</h1>
        <h3 class="text-white text-xl lg:text-3xl mt-4 lg:mt-8">Un Voyage à travers les Saveurs</h3>
      </div>

      <div class="mx-auto lg:mx-0">
        <!-- <UButton
          class="rounded-none w-full lg:w-auto h-14 lg:h-auto border-2 border-secondary-500 lg:mt-0 mt-20"
          color="primary"
          :trailing="false"
        >
          <span class="text-secondary-500 mx-auto lg:mx-0 text-lg">Voir les Ateliers</span>
        </UButton> -->

        <a href="#_" class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium bg-secondary-500 text-black-600 transition duration-300 ease-out border-2 border-secondary-500 rounded-lg shadow-md group">
        <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-primary-500 group-hover:translate-x-0 ease border-secondary-500">
        
        <img src="~/public/wine.png" alt="Icon" class="w-6 h-6">
        </span>
        <span class="absolute flex items-center justify-center w-full h-full text-black-500 transition-all duration-300 transform group-hover:translate-x-full ease">Voir les Ateliers</span>
        <span class="relative invisible">Voir les Ateliers</span>
        </a>

      </div>
    </div>
  </section>
</template>

