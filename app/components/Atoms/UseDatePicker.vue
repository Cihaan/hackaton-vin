<script setup lang="ts">
import { format } from 'date-fns'
import {DatePicker} from "v-calendar";
import 'v-calendar/dist/style.css'
const props = defineProps<{
  date: Date,
  disabled: boolean
}>()
</script>

<template>
  <UPopover :disabled="disabled" :popper="{ placement: 'bottom-start' }">
    <UButton :disabled="disabled" icon="i-heroicons-calendar-days-20-solid" :label="format(date, 'd MMM, yyy')" />

    <template #panel="{ close }">
      <DatePicker :disabled="disabled" :v-model="date" is-required @close="close" />
    </template>
  </UPopover>
</template>

