<script setup lang="ts">

import NavAdministration from "~/components/Administrations/NavAdministration.vue";
import Loader from "~/components/Atoms/Loader.vue";
import {format} from "date-fns";
import {useUserStore} from "~/store/UserStore";
import type {UserType} from "~/types/UserType";
import {useWorkshopStore} from "~/store/WorkshopStore";

const columns = [
  {
    key: 'drinker.email',
    label: 'Email'
  },
  {
    'key': 'workshop.name',
    'label': 'Atelier'
  },
  {
    'key': 'workshop.date',
    'label': 'Date'
  },
  {
    'key': 'workshop.deadline',
    'label': 'Date limite'
  },
  {
    key: 'actions',
    label: 'Paiement Validé'
  }
]

const selectedColumns = ref([...columns])

const isLoaded = ref(false);
const userStore = useUserStore();

userStore.getWaitList().then(() => {
  isLoaded.value = true;
});

definePageMeta({
  requiresAuth: true,
  middleware: 'guard-global'
})

function updateReservation(row : any) {
  const body : UserType = {
    isConfirmed: row.isConfirmed
  }
  useUserStore().updateReservation(row.id,body);


}
</script>

<template>

  <NavAdministration />
  <Loader v-if="!isLoaded"/>
  <transition name="fade" appear>
    <div v-if="isLoaded">
      <div class="container mx-auto lg:px-0 px-10 mb-40">

        <div class="flex gap-2 px-3 py-3.5 border-b border-gray-200 dark:border-gray-700">

          <USelectMenu v-model="selectedColumns" :options="columns" multiple placeholder="Columns" />
        </div>

        <UAlert class="mb-5" v-if="useUserStore().message" icon="i-heroicons-command-line" color="green"  :title="useUserStore().message" />

        <UTable :columns="selectedColumns" :rows="useUserStore().waitList" >

          <template #workshop.date-data="{ row }">
            <p>{{ row.workshop.date ? format(new Date(row.workshop.date), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #workshop.deadline-data="{ row }">
            <p>{{ row.workshop.deadline ? format(new Date(row.workshop.deadline), 'dd/MM/yyyy') : '' }}</p>
          </template>

          <template #actions-data="{ row }">
            <UToggle
                :loading="useUserStore().loading"
                on-icon="i-heroicons-check-20-solid"
                off-icon="i-heroicons-x-mark-20-solid"
                :model-value="row.isConfirmed"
                @update:model-value="row.isConfirmed = $event"
                @change="updateReservation(row)"
            />
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