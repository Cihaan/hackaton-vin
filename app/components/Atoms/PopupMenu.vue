<template>
    <div v-show="isVisible" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center" @click="closeMenu">
      <div class="bg-white p-8 rounded-lg" @click.stop>
        <ul>
          <li>
            <LinkNav to="/" @click="closeMenu">
              Accueil
            </LinkNav>
          </li>
          <li>
            <LinkNav to="/ateliers" @click="closeMenu">
              Ateliers
            </LinkNav>
          </li>
          <li>
            <LinkNav to="/administration" @click="closeMenu">
              Administration
            </LinkNav>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import LinkNav from "~/components/Atoms/LinkNav.vue";
  import { ref, onMounted, onUnmounted } from 'vue';

const isVisible = ref(false);

const closeMenu = () => {
  isVisible.value = false;
};

  </script>
  