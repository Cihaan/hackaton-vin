<script setup lang="ts">

import NavAdministration from "~/components/Administrations/NavAdministration.vue";
import {useWorkshopStore} from "~/store/WorkshopStore";
import Loader from "~/components/Atoms/Loader.vue";
import {format} from "date-fns";
import {useWineStore} from "~/store/WineStore";

const columns = [
  {
    key: 'name',
    label: 'Vin'
  },
  {
    key: 'year',
    label: 'Année'
  },
  {
    key: 'quantity',
    label: 'Quantité'
  },
  {
    key: 'type',
    label: 'Type'
  },
  {
    key: 'picture',
    label: 'Photo'
  }
  , {
    key: 'serviceTemperature',
    label: 'Température de service'
  }
  , {
    key: 'serviceKind',
    label: 'Type de service'
  }
  , {
    key: 'conservation',
    label: 'Conservation'
  }
  , {
    key: 'grapeVariety',
    label: 'Variété'
  }
  , {
    key: 'comment',
    label: 'Notes'
  }
  , {
    key: 'actions',
    label: 'Actions'
  }
]

const selectedColumns = ref([...columns])
const isLoaded = ref(false);
const wineStore = useWineStore();

wineStore.getWines().then(() => {
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

          <UButton icon="i-heroicons-document-plus-20-solid" label="Ajouter une bouteille de vin" class="ml-auto" to="/administration/cave/form" />

        </div>

        <UTable :columns="selectedColumns" :rows="useWineStore().listWine" >

          <template #date-data="{ row }">
            <p>{{ row.date ? format(new Date(row.date), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #deadline-data="{ row }">
            <p>{{ row.deadline ? format(new Date(row.deadline), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #actions-data="{ row }">
            <NuxtLink :to="`cave/form/${row.id}`" ><UButton class="mr-4" icon="i-heroicons-pencil-16-solid" /> </NuxtLink>
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