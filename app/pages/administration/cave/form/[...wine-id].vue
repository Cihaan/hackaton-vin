<script setup lang="ts">
import {useWorkshopStore} from "~/store/WorkshopStore";
import DatePicker from "~/components/Atoms/DatePicker.vue";
import {useWineStore} from "~/store/WineStore";
import {useDomainStore} from "~/store/DomainStore";
import type {WineType} from "~/types/WineType";
import type {DomainType} from "~/types/DomainType";


const name = ref('')
const domain = ref('')
const year = ref(2024)
const quantity = ref(0)
const type = ref('')
const picture = ref('')
const serviceTemperature = ref(0)
const serviceKind = ref('')
const conservation = ref('')
const limitDate = ref(new Date())
const comment = ref('')
const grapeVarieties = ref('')

// domain
const nameDomain = ref('')
const location = ref('')

const route = useRoute()
const id = route.params.wineid

const title = id ? 'Modification Bouteille Vin' : 'Création Bouteille Vin'

if(id){

  onMounted(async () => {
    await useWineStore().getWine(id)
    const wineDetail = useWineStore().wineDetail
    console.log(wineDetail.name)
    if(wineDetail)
    {
      name.value = wineDetail.name
      domain.value = wineDetail.domain.id
      year.value = wineDetail.year
      quantity.value = wineDetail.quantity
      type.value = wineDetail.type
      picture.value = wineDetail.picture
      serviceTemperature.value = wineDetail.serviceTemperature
      serviceKind.value = wineDetail.serviceKind
      conservation.value = wineDetail.conservation
      limitDate.value = new Date(wineDetail.limiteDate)
      comment.value = wineDetail.comment
      grapeVarieties.value = wineDetail.grapeVariety
    }

  })
}


// Récuperation Etablissement ( ecole )
useDomainStore().getDomains()

const isOpen = ref(false)

function onSubmitWine(){
  const wine : WineType = {
    name: name.value,
    domain: 'api/domains/' + domain.value,
    year: year.value,
    quantity: quantity.value,
    type: type.value,
    picture: picture.value,
    serviceTemperature: serviceTemperature.value,
    serviceKind: serviceKind.value,
    conservation: conservation.value,
    limiteDate: limitDate.value,
    comment: comment.value,
    grapeVariety: grapeVarieties.value
  }

  if(id){
    useWineStore().updateWine(parseInt(id[0]), wine)
  }
  else {
    useWineStore().addWine(wine)
  }

  setTimeout(() => {
    useWineStore().setMessage('')
    navigateTo('/administration/cave')
  }, 2000)

}

function onSubmitDomain(){

  const domain : DomainType = {
    name: nameDomain.value,
    location: location.value,
  };
  useDomainStore().addDomain(domain)

  setTimeout(() => {
    useDomainStore().setMessage('')
    isOpen.value = false
    useDomainStore().getDomains()
  }, 2000)

}


function handleFileChangeBanner(event: { target: { files: any[]; }; }) {
  const selectedFile = event.target.files[0];
  if (selectedFile) {
    //to base64
    const reader = new FileReader();
    reader.readAsDataURL(selectedFile);
    reader.onload = () => {
      picture.value = reader.result as string
    }

  }
}

</script>

<template>


  <form class="container mx-auto lg:px-0 px-10 mt-10 mb-10" @submit.prevent="onSubmitWine" >
    <UCard >
      <template #header>

        <div class="flex justify-between items-center">
          <h1 class="text-wine-600 text-3xl py-10 font-bold lg:text-start text-center">{{ title }}</h1>

          <UButton icon="i-heroicons-arrow-long-left-16-solid" label="Retour à la liste" class="h-10" to="/administration/cave" />

        </div>

      </template>

      <div class="flex flex-col gap-6">

        <UFormGroup label="Nom Vin" name="name">
          <UInput v-model="name" required/>
        </UFormGroup>

        <UFormGroup label="Région" name="school_id" >
          <USelect required v-model="domain" value-attribute="id" :loading="useDomainStore().loading" :options="useDomainStore().listDomain" option-attribute="name" placeholder="Sélectionner une région"/>

          <UButton @click="isOpen = true"  class="mt-4"> Ajouter une région</UButton>
        </UFormGroup>

        <UFormGroup label="Année" name="year">
          <UInput v-model="year" required />
        </UFormGroup>

        <UFormGroup label="Date limite" name="date" >
          <DatePicker v-model="limitDate" required/>
        </UFormGroup>

        <UFormGroup label="Quantité" name="quantite" >
          <UInput v-model="quantity" required />
        </UFormGroup>

        <UFormGroup label="Type de Vin" name="type" >
          <UInput v-model="type" required />
        </UFormGroup>

        <!--     changer le non du fichier-->
        <label>Image Vin</label>
        <input type="file" name="file" id="file" @change="handleFileChangeBanner"
               accept="image/png, image/jpeg , image/jpg"
        />
        <img :src="picture" alt="" class="w-1/4 h-1/4" v-if="picture"/>


        <UFormGroup label="Temperature service" name="description" >
          <UInput type="number" v-model="serviceTemperature" required/>
        </UFormGroup>

        <UFormGroup label="Type Service" name="price" >
          <UInput v-model="serviceKind" required/>
        </UFormGroup>

        <UFormGroup label="Conservation" name="password" >
          <UInput v-model="conservation" type="text" required/>
        </UFormGroup>

        <UFormGroup label="Variété Raisin" name="password" >
          <UInput v-model="grapeVarieties" type="text" required/>
        </UFormGroup>

        <UFormGroup label="Commentaires sur le Vin" name="password" >
          <UTextarea v-model="comment" type="text" required/>
        </UFormGroup>

      </div>

      <template #footer>
        <UButton  v-if="!useWineStore().message" :loading="useWineStore().loading" type="submit">
          Enregistrer
        </UButton>

        <UAlert v-else icon="i-heroicons-command-line" color="green"  :title="useWineStore().message" />

      </template>

    </UCard>
  </form>

  <UModal v-model="isOpen" prevent-close>
    <form @submit.prevent="onSubmitDomain" >
      <UCard :ui="{ ring: '', divide: 'divide-y divide-gray-100 dark:divide-gray-800' }">
        <template #header>
          <div class="flex items-center justify-between">
            <h3 class="text-base font-bold text-primary">
              Ajout d'un établissement
            </h3>
            <UButton color="gray" variant="ghost" icon="i-heroicons-x-mark-20-solid" class="-my-1" @click="isOpen = false" />
          </div>

          <UAlert class="mt-5" icon="i-heroicons-command-line" color="green" v-if="useDomainStore().message" :title="useDomainStore().message" />
        </template>

        <div class="flex flex-col gap-4">
          <UFormGroup label="Région" name="region">
            <UInput v-model="nameDomain" required/>
          </UFormGroup>
        </div>

        <template #footer>
          <UButton  :loading="useDomainStore().loading" type="submit">
            Enregistrer
          </UButton>
        </template>
      </UCard>
    </form>
  </UModal>

</template>

<style scoped>
input[type=file]::file-selector-button {
  margin-right: 8px;
  border: none;
  padding: 8px 12px;
  cursor: pointer;
  @apply rounded-md bg-wine-100 text-white;
}
</style>