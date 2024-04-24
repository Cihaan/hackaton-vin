<script setup lang="ts">
import type {WorkshopType} from "~/types/WorkshopType";
import {ref} from 'vue';
import {useWorkshopStore} from '~/store/WorkshopStore';
import Loader from '~/components/Atoms/Loader.vue';

const route = useRoute()

// When accessing /posts/1, route.params.id will be 1
console.log(route.params.workshopid)
//    async function getWorkShop(id: string | string[]) {
// const {
//   data,
//   pending,
//   error,
//   refresh
// } = await useFetch<WorkshopType>('http://127.0.0.1:8000/api/workshops/' + id, {})
// if (data.value) {
//   // @ts-ignore
//   return data.value
// }
//
// return null
// }

const isLoaded = ref(false);
const workshopStore = useWorkshopStore();
workshopStore.getWorkShop(route.params.workshopid).then(() => {
  isLoaded.value = true;
  console.log(workshopStore.workshopDetail?.name)
});

</script>

<template>
  <div class="container mx-auto">
    <Loader v-if="!isLoaded"/>
    <transition name="fade" appear>
      <div v-if="isLoaded" class="min-h-screen ">
        {{ workshopStore.workshopDetail.name }}
      </div>
    </transition>
  </div>
</template>

<style scoped>

</style>