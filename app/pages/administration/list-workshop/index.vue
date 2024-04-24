<script setup lang="ts">

import NavAdministration from "~/components/Administrations/NavAdministration.vue";
import {useWorkshopStore} from "~/store/WorkshopStore";
import Loader from "~/components/Atoms/Loader.vue";
import TrueDatePicker from "~/components/Atoms/DatePicker.vue";

const columns = [
{
  key: 'name',
  label: 'Atelier'
},
{
  key: 'date',
  label: 'Date'
},
{
  key: 'school_id',
  label: 'Lieu'
},
{
  key: 'limitDrinker',
  label: 'Nombres Places'
},
{
  key: 'theme',
  label: 'Thème'
}
, {
  key: 'description',
  label: 'Description'
}
, {
  key: 'deadline',
  label: 'Deadline'
}
, {
  key: 'price',
  label: 'Prix'
}

, {
  key: 'actions',
  label: 'Actions'
}
]

const selectedColumns = ref([...columns])

const people = [{
  id: 1,
  name: 'Lindsay Walton',
  title: 'Front-end Developer',
  email: 'lindsay.walton@example.com',
  role: 'Member'
}, {
  id: 2,
  name: 'Courtney Henry',
  title: 'Designer',
  email: 'courtney.henry@example.com',
  role: 'Admin'
}, {
  id: 3,
  name: 'Tom Cook',
  title: 'Director of Product',
  email: 'tom.cook@example.com',
  role: 'Member'
}, {
  id: 4,
  name: 'Whitney Francis',
  title: 'Copywriter',
  email: 'whitney.francis@example.com',
  role: 'Admin'
}, {
  id: 5,
  name: 'Leonard Krasner',
  title: 'Senior Designer',
  email: 'leonard.krasner@example.com',
  role: 'Owner'
}, {
  id: 6,
  name: 'Floyd Miles',
  title: 'Principal Designer',
  email: 'floyd.miles@example.com',
  role: 'Member'
}]



const isLoaded = ref(false);
const workshopStore = useWorkshopStore();

workshopStore.getWorkShop().then(() => {
  isLoaded.value = true;
});


</script>

<template>

      <NavAdministration />


  <Loader v-if="!isLoaded"/>
  <transition name="fade" appear>
    <div v-if="isLoaded">
      <div class="container mx-auto lg:px-0 px-10">

        <div class="flex gap-2 px-3 py-3.5 border-b border-gray-200 dark:border-gray-700">
          <USelectMenu v-model="selectedColumns" :options="columns" multiple placeholder="Columns" />

          <TrueDatePicker />
        </div>

        <UTable :columns="selectedColumns" :rows="useWorkshopStore().listWorkshop" >

          <template #actions-data="{ row }">
            <NuxtLink :to="`list-workshop/form/${row.id}`" ><UButton class="mr-4" icon="i-heroicons-pencil-16-solid" /> </NuxtLink>
            <UButton icon="i-heroicons-trash-16-solid" />
          </template>

        </UTable>
      </div>
    </div>
  </transition>



</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.8s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>