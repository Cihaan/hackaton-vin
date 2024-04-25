<script setup lang="ts">
import { format } from 'date-fns'
import {DatePicker} from "v-calendar";
import 'v-calendar/dist/style.css'
const props = defineProps<{
  date: Date
}>()
</script>

<template>
  <UPopover :popper="{ placement: 'bottom-start' }">
    <UButton icon="i-heroicons-calendar-days-20-solid" :label="format(date, 'd MMM, yyy')" />

    <template #panel="{ close }">
      <DatePicker :v-model="date" is-required @close="close" />
    </template>
  </UPopover>
</template>

