<script setup lang="ts">
import DatePicker from "~/components/Atoms/DatePicker.vue";

const name = ref('')
const school = ref('')
const date = ref('')
const theme = ref('')
const description = ref('')
const price = ref(0)

const route = useRoute()
const id = route.params.workshopid

const title = id ? 'Modification Atelier' : 'Création Atelier'

function onSubmit(){

}
</script>

<template>

  <UForm class="container mx-auto lg:px-0 px-10 mt-10" @submit.prevent="onSubmit" >

  <UCard >
    <template #header>
      <h1 class="text-wine-600 text-3xl py-10 font-bold lg:text-start text-center">{{ title }}</h1>
    </template>

    <div class="flex flex-col gap-6">

      <UFormGroup label="Nom Atelier" name="name">
        <UInput v-model="name" />
      </UFormGroup>

      <UFormGroup label="Etablissement" name="school_id">
        <USelect v-model="school" />
      </UFormGroup>

      <UFormGroup label="Date atelier" name="date">
        <DatePicker />
      </UFormGroup>

      <UFormGroup label="Thèmes" name="theme">
        <UInput v-model="theme" />
      </UFormGroup>

      <UFormGroup label="Deadline" name="deadline">
        <DatePicker />
      </UFormGroup>

      <UFormGroup label="Description" name="description">
        <UTextarea v-model="description" />
      </UFormGroup>

      <UFormGroup label="Prix" name="price">
        <UInput v-model="price" type="number" />
      </UFormGroup>
    </div>

    <template #footer>
      <UButton type="submit">
        Enregistrer
      </UButton>
    </template>
  </UCard>

  </UForm>
</template>