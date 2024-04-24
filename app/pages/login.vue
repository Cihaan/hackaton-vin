<script setup lang="ts">
import LoginForm from '~/components/auth/LoginForm.vue';
import {useUserStore} from '~/store/UserStore';

const userStore = useUserStore();
const email = ref('');
const password = ref('');

</script>

<template>
  <UContainer
      class="py-20"
  >
    <UCard
        class="bg-white h-[600px]"
    >
      <template #header>
        <h1>Connexion</h1>

        <UAlert
            v-if="userStore.isError"
            icon="i-heroicons-shield-exclamation"
            color="red"
            variant="solid"
            title="Erreur"
            description="Le login ou mot de passe est erroné, veuillez réessayer."
        />
      </template>

      <UAlert
          class="mb-4"
          icon="i-heroicons-identification"
          variant="solid"
          title="Formulaire de connexion"
          description="Vueillez renseigner vos identifiants et mot de passe pour vous connecter à l'application en tant qu'administrateur"
      />

        <LoginForm  v-model:email="email" v-model:password="password"/>

      <template #footer>
        <UButton
            @click="userStore.login(email, password)"
            :disabled="email.length === 0 || password.length === 0"
        >
          Submit
        </UButton>
      </template>
    </UCard>
  </UContainer>
</template>