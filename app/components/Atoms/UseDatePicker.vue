<script setup lang="ts">
import { format } from 'date-fns'
import { DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
const props = defineProps({
  date: {
    type: Date,
    required: true
  },
  affichageHeure: {
    type: Boolean,
    default: false
  }
})

const formatDate = ref('dd-MM-yyyy')

if (props.affichageHeure){
  formatDate.value = 'dd-MM-yyyy HH:mm'
}

const emit = defineEmits(['update:model-value'])
const updateDate = (newDate : Date) => {
  emit('update:model-value',format(newDate, 'yyyy-MM-dd HH:mm:ss'));
}

</script>

<template>
  <UPopover :popper="{ placement: 'bottom-start' }">
    <UButton class="bg-primary" icon="i-heroicons-calendar-days-20-solid" :label="format(date, formatDate)" locale="fr" />

    <template #panel="{ close }">
      <DatePicker :v-model="date" :mode="affichageHeure ? 'datetime' : 'date'" @update:model-value="updateDate" @close="close"  />
    </template>
  </UPopover>
</template>