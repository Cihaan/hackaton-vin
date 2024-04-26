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
    key: 'banner',
    label: 'Bannière'
  },
  {
    key: 'mainImage',
    label: 'Photo principale'
  },

  {
    key: 'date',
    label: 'Date'
  },
  {
    key: 'endDate',
    label: 'Date de fin'
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
    label: 'Description',
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

  <NavAdministration/>
  <Loader v-if="!isLoaded"/>
  <transition name="fade" appear>
    <div v-if="isLoaded">
      <div class="container mx-auto lg:px-0 px-10 mb-40">

        <div class="flex gap-2 px-3 py-3.5 border-b border-gray-200 dark:border-gray-700">

          <USelectMenu v-model="selectedColumns" :options="columns" multiple placeholder="Columns"/>

          <UButton icon="i-heroicons-document-plus-20-solid" label="Ajouter un atelier" class="ml-auto"
                   to="/administration/list-workshop/form"/>

        </div>

        <UTable :columns="selectedColumns" :rows="useWorkshopStore().listWorkshop">

          <template #date-data="{ row }">
            <p>{{ row.date ? format(new Date(row.date), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #endDate-data="{ row }">
            <p>{{ row.date ? format(new Date(row.endDate), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #deadline-data="{ row }">
            <p>{{ row.deadline ? format(new Date(row.deadline), 'dd/MM/yyyy') : '' }}</p>
          </template>


          <template #mainImage-data="{ row }">
            <img :src="row.mainImage" alt="" class="w-20"/>
          </template>

          <template #banner-data="{ row }">
            <img :src="row.banner" alt="" class="w-20"/>
          </template>


          <template #actions-data="{ row }">
            <NuxtLink :to="`list-workshop/form/${row.id}`">
              <UButton class="mr-4" icon="i-heroicons-pencil-16-solid"/>
            </NuxtLink>
<!--            <UButton icon="i-heroicons-trash-16-solid" @click="useWorkshopStore().currentWorkshop = row.id; useWorkshopStore().isModalOpen = true; "/>-->

          </template>

        </UTable>
      </div>

      <UModal :model-value="useWorkshopStore().isModalOpen">
        <UCard>
          <template #header>
            <h2 class="text-xl font-bold">Suppression d'un atelier</h2>
          </template>

          <template #default>
            <p>Êtes-vous sûr de vouloir supprimer cette atelier ?</p>
          </template>

          <template #footer>
            <div class="flex justify-end gap-2">
              <UButton label="Annuler" variant="outline" @click="useWorkshopStore().isModalOpen = false"/>
              <UButton label="Supprimer" :loading="useWorkshopStore().loading" @click="useWorkshopStore().deleteWorkshop"/>
            </div>
          </template>
        </UCard>
      </UModal>
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