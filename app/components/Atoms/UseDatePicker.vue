<script setup lang="ts">
import { format } from 'date-fns'
import { DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
const props = defineProps({
  date: {
    type: Date,
    required: true
  },
})

const formatDate = ref('dd-MM-yyyy')

const emit = defineEmits(['update:modelValue'])
const updateDate = (newDate : Date) => {
  emit('update:modelValue',format(newDate, 'yyyy-MM-dd'));
}

</script>

<template>
  <UPopover :popper="{ placement: 'bottom-start' }">
    <UButton class="bg-primary" icon="i-heroicons-calendar-days-20-solid" :label="format(date, formatDate)" locale="fr" />

    <template #panel="{ close }">
      <DatePicker :v-model="date" :mode="'date'" @update:model-value="updateDate" @close="close"  />
    </template>
  </UPopover>
</template>