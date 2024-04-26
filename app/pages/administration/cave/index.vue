<script setup lang="ts">

import NavAdministration from '~/components/Administrations/NavAdministration.vue';
import {useWorkshopStore} from '~/store/WorkshopStore';
import Loader from '~/components/Atoms/Loader.vue';
import {format} from 'date-fns';
import {useWineStore} from '~/store/WineStore';

const columns = [
  {
    key: 'name',
    label: 'Vin'
  },
  {
    key: 'picture',
    label: 'Photo'
  },
  {
    key: 'domain.name',
    label: 'Région'
  },
  {
    key: 'deadline',
    label: 'Date limite'
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
];

const selectedColumns = ref([...columns]);
const isLoaded = ref(false);
const wineStore = useWineStore();

wineStore.getWines().then(() => {
  isLoaded.value = true;
});

definePageMeta({
  requiresAuth: true,
  middleware: 'guard-global'
});

</script>

<template>

  <NavAdministration/>
  <Loader v-if="!isLoaded"/>
  <transition name="fade" appear>
    <div v-if="isLoaded">
      <div class="container mx-auto lg:px-0 px-10 mb-40">

        <div class="flex gap-2 px-3 py-3.5 border-b border-gray-200 dark:border-gray-700">

          <USelectMenu v-model="selectedColumns" :options="columns" multiple placeholder="Columns"/>

          <UButton icon="i-heroicons-document-plus-20-solid" label="Ajouter une bouteille de vin" class="ml-auto"
                   to="/administration/cave/form"/>

        </div>

        <UTable :columns="selectedColumns" :rows="useWineStore().listWine">

          <template #date-data="{ row }">
            <p>{{ row.date ? format(new Date(row.date), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #deadline-data="{ row }">
            <p>{{ row.deadline ? format(new Date(row.deadline), 'dd/MM/yyyy') : '' }}</p>
          </template>


          <template #picture-data="{ row }">
            <img :src="row.picture" alt="" class="w-20"/>
          </template>

          <template #actions-data="{ row }">
            <NuxtLink :to="`cave/form/${row.id}`">
              <UButton class="mr-4" icon="i-heroicons-pencil-16-solid"/>
            </NuxtLink>
            <UButton icon="i-heroicons-trash-16-solid" @click="wineStore.currentWine = row.id; wineStore.isModalOpen = true; "/>
          </template>

        </UTable>
      </div>
    </div>
  </transition>

  <UModal :model-value="wineStore.isModalOpen">
    <UCard>
      <template #header>
        <h2 class="text-xl font-bold">Suppression d'une bouteille</h2>
      </template>

      <template #default>
        <p>Êtes-vous sûr de vouloir supprimer cette bouteille ?</p>
      </template>

      <template #footer>
        <div class="flex justify-end gap-2">
          <UButton label="Annuler" variant="outline" @click="wineStore.isModalOpen = false"/>
          <UButton label="Supprimer" :loading="wineStore.loading" @click="wineStore.deleteWine"/>
        </div>
      </template>
    </UCard>
  </UModal>

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