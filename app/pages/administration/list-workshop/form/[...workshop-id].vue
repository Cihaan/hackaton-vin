<script setup lang="ts">
import {useSchoolStore} from "~/store/SchoolStore";
import type {SchoolType} from "~/types/SchoolType";
import {useWorkshopStore} from "~/store/WorkshopStore";
import type {WorkshopType} from "~/types/WorkshopType";
import DatePicker from "~/components/Atoms/UseDatePicker.vue";

const name = ref('')
const school = ref(0)
const date = ref(new Date())
const deadline = ref(new Date())
const theme = ref('')
const description = ref('')
const price = ref(0)
const location = ref('')
const limitDrinker = ref(0)
const password = ref('')

// school
const nameSchool = ref('')

const route = useRoute()
const id = route.params.workshopid

const title = id ? 'Modification Atelier' : 'Création Atelier'

if(id){
  useWorkshopStore().getWorkShop(id)

  onMounted(async () => {
    const workshopDetail = useWorkshopStore().workshopDetail
    if(workshopDetail)
    {
      name.value = workshopDetail.name ?? ''
      school.value = workshopDetail.school.id
      date.value = new Date(workshopDetail.date)
      deadline.value = new Date(workshopDetail.deadline)
      description.value = workshopDetail.description
      price.value = workshopDetail.price
      location.value = workshopDetail.location
      limitDrinker.value = workshopDetail.limitDrinker
      password.value = workshopDetail.password
    }

  })
}


// Récuperation Etablissement ( ecole )
useSchoolStore().getSchool()

console.log(useSchoolStore().listSchool)
const isOpen = ref(false)

function onSubmitWorkshop(){
  const workshop : WorkshopType = {
    name: name.value,
    school: 'api/schools/' + school.value,
    date: date.value,
    theme: theme.value,
    description: description.value,
    price: price.value,
    location: location.value,
    limitDrinker: limitDrinker.value,
    deadline: deadline.value,
    password: password.value,
    isCanceled : false
  }

  if(id){
    useWorkshopStore().updateWorkShop(parseInt(id[0]), workshop)
  }
  else {
    useWorkshopStore().addWorkShop(workshop)
  }

  setTimeout(() => {
    useWorkshopStore().setMessage('')
    navigateTo('/administration/list-workshop')
  }, 2000)

}

function onSubmitSchool(){

  const school : SchoolType = {
    name: nameSchool.value,
  };
  useSchoolStore().addSchool(school)

  setTimeout(() => {
    useSchoolStore().setMessage('')
    isOpen.value = false
    useSchoolStore().getSchool()
  }, 2000)

}
</script>

<template>


  <form class="container mx-auto lg:px-0 px-10 mt-10 mb-10" @submit.prevent="onSubmitWorkshop" >
    <UCard >
      <template #header>

        <div class="flex justify-between items-center">
          <h1 class="text-wine-600 text-3xl py-10 font-bold lg:text-start text-center">{{ title }}</h1>

          <UButton icon="i-heroicons-arrow-long-left-16-solid" label="Retour à la liste" class="h-10" to="/administration/list-workshop" />

        </div>

      </template>

      <div class="flex flex-col gap-6">

        <UFormGroup label="Nom Atelier" name="name">
          <UInput v-model="name" required/>
        </UFormGroup>

        <UFormGroup label="Etablissement" name="school_id" >
          <USelect required v-model="school" value-attribute="id" :loading="useSchoolStore().loading" :options="useSchoolStore().listSchool" option-attribute="name" placeholder="Sélectionner un établissement"/>

          <UButton @click="isOpen = true"  class="mt-4"> Ajouter un établissement</UButton>
        </UFormGroup>

        <UFormGroup label="Rue/Salle" name="location">
          <UInput v-model="location" required />
        </UFormGroup>

        <UFormGroup label="Date atelier" name="date" >
          <DatePicker v-model="date" required/>
        </UFormGroup>

        <UFormGroup label="Thèmes" name="theme" >
          <UInput v-model="theme" />
        </UFormGroup>

        <UFormGroup label="Deadline" name="deadline" >
          <DatePicker v-model="deadline" required />
        </UFormGroup>

        <UFormGroup label="Nombres de places" name="nbPlace" >
          <UInput v-model="limitDrinker" type="number" required />
        </UFormGroup>

        <UFormGroup label="Description" name="description" >
          <UTextarea v-model="description" required/>
        </UFormGroup>

        <UFormGroup label="Prix" name="price" >
          <UInput v-model="price" type="number" required/>
        </UFormGroup>

        <UFormGroup label="Mot de passe atelier" name="password" >
          <UInput v-model="password" type="text" required/>
        </UFormGroup>
      </div>

      <template #footer>
        <UButton  v-if="!useWorkshopStore().message" :loading="useWorkshopStore().loading" type="submit">
          Enregistrer
        </UButton>

        <UAlert v-else icon="i-heroicons-command-line" color="green"  :title="useWorkshopStore().message" />

      </template>

    </UCard>
  </form>

  <UModal v-model="isOpen" prevent-close>
    <form @submit.prevent="onSubmitSchool" >
      <UCard :ui="{ ring: '', divide: 'divide-y divide-gray-100 dark:divide-gray-800' }">
        <template #header>
          <div class="flex items-center justify-between">
            <h3 class="text-base font-bold text-primary">
              Ajout d'un établissement
            </h3>
            <UButton color="gray" variant="ghost" icon="i-heroicons-x-mark-20-solid" class="-my-1" @click="isOpen = false" />
          </div>

          <UAlert class="mt-5" icon="i-heroicons-command-line" color="green" v-if="useSchoolStore().message" :title="useSchoolStore().message" />
        </template>


        <div class="flex flex-col gap-4">
          <UFormGroup label="Nom Etablissement" name="name">
            <UInput v-model="nameSchool" required/>
          </UFormGroup>
        </div>

        <template #footer>
          <UButton  :loading="useSchoolStore().loading" type="submit">
            Enregistrer
          </UButton>
        </template>
      </UCard>
    </form>
  </UModal>

</template>