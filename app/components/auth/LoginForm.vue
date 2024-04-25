<script setup lang="ts">
const email = defineModel<string>('email')
const password = defineModel<string>('password')
</script>

<template>
  <UFormGroup label="Email" name="email" class="mb-5">
    <UInput v-model="email"/>
  </UFormGroup>

  <UFormGroup label="Password" name="password">
    <UInput v-model="password" type="password"/>
  </UFormGroup>
</template>
