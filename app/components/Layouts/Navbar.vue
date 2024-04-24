<template>
  <header>
    <nav class="container flex items-center justify-between mx-auto px-6" aria-label="Global">
      <div class="flex lg:flex-1">
        <NuxtLink to="/">
          <NuxtImg class="h-16 w-auto" src="img/logo.png" alt="Logo"/>
        </NuxtLink>
      </div>

      <div class="lg:hidden">
        <img src="~/public/Hamburger_icon.png" alt="Menu" @click="toggleMenu" class="h-8 w-auto cursor-pointer">
      </div>

      <PopupMenu v-show="showMenu" @close="closeMenu"/>

      <div :class="{ 'hidden': true }" class="flex lg:flex gap-4">
        <LinkNav to="/" class="w-full relative h-16 flex items-center justify-center p-2">
          <div class="transform h-16 w-24 hover:bg-primary transition duration-500 flex justify-center items-center">
            <p class="text-lg text-primary hover:text-white">Accueil</p>
          </div>
        </LinkNav>

        <LinkNav to="/workshop">
          Ateliers
        <LinkNav to="/" class="w-full relative h-16 flex items-center justify-center p-2">
          <div class="transform h-16 w-24 hover:bg-primary transition duration-500  flex justify-center items-center">
            <p class="text-lg text-primary hover:text-white">Ateliers</p>
          </div>
        </LinkNav>

        <LinkNav to="/administration/list-workshop">
          Administration
        <LinkNav to="/" class="w-full relative h-16 flex items-center justify-center p-2">
          <div class="transform h-16 p-2 hover:bg-primary transition duration-500 hover:text-white flex justify-center items-center">
            <p class="text-lg text-primary hover:text-white">Administration</p>
          </div>
        </LinkNav>
      </div>
    </nav>
  </header>
</template>
