<script setup lang="ts">

import NavAdministration from "~/components/Administrations/NavAdministration.vue";
import {useWorkshopStore} from "~/store/WorkshopStore";
import Loader from "~/components/Atoms/Loader.vue";
import {format} from "date-fns";

const columns = [
{
  key: 'name',
  label: 'Atelier'
},
{
  key : 'mainImage',
  label: 'Photo principale'
},
{
  key: 'date',
  label: 'Date'
},
{
  key: 'school.name',
  label: 'Etablissement'
},
{
  key: 'location',
  label: 'Rue/Salle'
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
  label: 'Date limite'
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
const isLoaded = ref(false);
const workshopStore = useWorkshopStore();

workshopStore.getWorkShops().then(() => {
  isLoaded.value = true;
});

definePageMeta({
  requiresAuth: true,
  middleware: 'guard-global'
})

</script>

<template>

  <NavAdministration />
  <Loader v-if="!isLoaded"/>
  <transition name="fade" appear>
    <div v-if="isLoaded">
      <div class="container mx-auto lg:px-0 px-10 mb-40">

        <div class="flex gap-2 px-3 py-3.5 border-b border-gray-200 dark:border-gray-700">

          <USelectMenu v-model="selectedColumns" :options="columns" multiple placeholder="Columns" />

          <UButton icon="i-heroicons-document-plus-20-solid" label="Ajouter un atelier" class="ml-auto" to="/administration/list-workshop/form" />

        </div>

        <UTable :columns="selectedColumns" :rows="useWorkshopStore().listWorkshop" >

          <template #date-data="{ row }">
            <p>{{ row.date ? format(new Date(row.date), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #deadline-data="{ row }">
            <p>{{ row.deadline ? format(new Date(row.deadline), 'dd/MM/yyyy') : '' }}</p>
          </template>


          <template #mainImage-data="{ row }">
            <img :src="row.mainImage" alt="" class="w-20" />
          </template>


          <template #actions-data="{ row }">
            <NuxtLink :to="`list-workshop/form/${row.id}`" ><UButton class="mr-4" icon="i-heroicons-pencil-16-solid" /> </NuxtLink>
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