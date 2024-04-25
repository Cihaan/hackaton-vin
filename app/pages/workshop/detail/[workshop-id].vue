<script setup lang="ts">
import type {WorkshopType} from "~/types/WorkshopType";
import {ref} from 'vue';
import {useWorkshopStore} from '~/store/WorkshopStore';
import Loader from '~/components/Atoms/Loader.vue';

const route = useRoute()

const isOpen = ref(false);
const email = ref("")

const isLoaded = ref(false);
const workshopStore = useWorkshopStore();
let workshop = ref<WorkshopType | null>(null);
workshopStore.getWorkShop(route.params.workshopid).then(() => {
  isLoaded.value = true;
  workshop = workshopStore.workshopDetail
});

</script>

<template>
  <div class="container mx-auto">
    <Loader v-if="!isLoaded"/>
    <transition name="fade" appear>
      <div v-if="isLoaded" class="min-h-screen ">
        <!--        je rajoute une baniere-->
        <img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt=""
             class=" shadow-md rounded-md bg-slate-50 w-full h-64 my-6 object-cover "
        >
        <div class="flex flex-row justify-between items-center mb-4">
          <UButton
              @click="workshopStore.reservationModalOpen = true"
          >Réserver</UButton>
          <p class="text-lg font-medium text-end font-sans">Participation : {{ workshop.price }}€ par personnes</p>
        </div>
        <h1 class="mb-1 text-3xl  text-wine-600 font-sans font-medium">
          {{ workshop.name }}
        </h1>

        <p class="font-medium">Atelier limité à {{ workshop.limitDrinker }} personnes</p>
        <p class="break-all font-sans pt-6">{{ workshop.description }}</p>
        <h3 class="text-wine-600 text-2xl font-bold pt-6">
          Différents thèmes vous sont proposés :
        </h3>
        <ul class="list-disc list-inside">
          <li v-for=" (theme, index) in workshop.theme" :key="index">
            {{ theme }}
          </li>
        </ul>
      </div>
    </transition>
  </div>

  <UModal v-model="workshopStore.reservationModalOpen">
    <UCard :ui="{ ring: '', divide: 'divide-y divide-gray-100 dark:divide-gray-800' }">
      <template #header>
        <h2 class="text-lg font-semibold">Réserver un atelier</h2>

        <UAlert
            v-if="workshopStore.reservationError"
            icon="i-heroicons-shield-exclamation"
            color="red"
            variant="solid"
            title="Erreur"
            :description="workshopStore.reservationError"
        />
      </template>

      <UInput v-model="workshopStore.reservationEmail" label="email" />

      <template #footer>
        <UButton
            @click="workshopStore.reserveWorkShop(route.params.workshopid.toString())"
        >Valider</UButton>
      </template>
    </UCard>
  </UModal>


  <UModal v-model="workshopStore.reservationModalPaiement">
    <UCard :ui="{ ring: '', divide: 'divide-y divide-gray-100 dark:divide-gray-800' }">
      <template #header>
        <h2 class="text-lg font-semibold">Comment valider la réservation</h2>

        <UAlert
            icon="i-heroicons-shield-exclamation"
            color="blue"
            variant="solid"
            title="Information"
            description="Votre réservation ne sera pas validée tant que vous n'aurez pas éffectuer le paiement à l'animateur"
        />
      </template>

      <UCard>
        <img src="https://www.1min30.com/wp-content/uploads/2017/09/Paypal-logo.jpg" alt="paypal" height="200">
        <span class="text-red-600">Régler par Paypal: bonnetonolivier@gmail.com</span>
      </UCard>

      <UCard>
        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxANDhUODQ0NDg0NDQ4NDg8NDhsOEA8OFhEWGhURFhUZHCggGBolHRYVITEtJSorMC4uGiEzRDMsNygvLi8BCgoKDg0OFg8QFy0gHx0yKy0rLS0rLSsrLS0tKy0tLS0tLSstLSstLSsrLS0tLS0rLSs3Ky0tNzcrLSsrKy0tN//AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEBAAMAAwEAAAAAAAAAAAAAAQUGBwMECAL/xABAEAACAgEBBQQHBQYEBwEAAAAAAQIDBBEFBgcSIRMxQVEUIjVhcXSzc4GRobIyMzRCscEVcqK0IyQlUlR1glP/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQID/8QAHREBAQEAAgMBAQAAAAAAAAAAAAERAjESIUJBMv/aAAwDAQACEQMRAD8A0EAHdAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACkAEBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAUEAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAAQEFBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAQAAAAAAAAAAAAAAAAAAAAAAPY2dgXZVipxqbL7ZdVCuPM9PN+CXvfQD1wdL2LweybUpZuTVjJ9XXVHt7NPJy1UYv4cxtONwh2dFaTszLX4uVsY/lGKJ5QcLBmN8dnV4W0b8Wjm7KiyMYc8uaWjri+r8erZtcOFN9+HVl4mVVZK/GpvdN0HU05wUnFWJtPv8AFL4l0c8B7m1tk5GDb2OXRZRZ1aU10kl4xkukl8Gz0wAAAAAAAAICACghnNkbobRzqlfiYcrqXKUVNXVQ9aL0a0nNP8gMIDYdmbj7TynJVYNiULJ1TnbKNUFOLaklKT9daprWOqMhk8MNrVx5ljV2afy1ZEHL/U0Ng04Hky8Wyix1XVzqtg9JQsi4Si/emXExbL7FVRXO22b0jCuLnKXwSA8QNxxuF+1rI8zxq6tf5bciHN/pbMftPcbaeLKMbcKxqyyFUJ1SjZBznJRinJP1E20tZaL3jYNeBm9sbobRwKu3zMOVFPNGHO7qrPWfctITb/I8uBuNtTJqhfRgTspugp1zV9MVKL7npKxNfeho18HkysedNkqbY8ltU5V2RbT5Zxeko6ptPRp9x72w938vaLnHBx5ZEqVB2KNkK+VS15X68o668r7vIDGgyW2938vZzhHOx3jyuUpVp2Qs5lHTmfqSlp+0u/zPBsfZtmbk14tC1tvsVcfKK/mm/dFJyfuQHqHdOCFcVsyclGKlLMtUpJdZJRhom/HTVmicVtj1bOtxMXHWldWE9W/2pzdsuayXm2+pvvBH2VL5y79MDPK7FdAB6m1Np0YdTvyrq6aotJzsei5n3RXm/cj1dh7x4e0VJ4WTXd2enPGOsZwT10bhJJpPR+HgcxwLiT7Zy/tofRgd63O9mYnyOL9KJwTiT7Zy/tofRrOy7M3kw9m7LwfTb1T22DR2etc583LVDm/Zi9O9d5vl1BsG2Nk0Z1LoyqYW1S8JLrF+Eovvi/ejgm/25FuyLFODldhWy0qta9aEv/zs06a+T7n7u47Pgb87LyJKFW0Mfnk9Ixsbpcn5LnS1ZmNp4FWXRPHvgp03QcJxfin4p+DXen4NElwfKYMpvRsOzZmZZiWNy7N61zfTtKX1hP8ADo/emjFHRFBABQQAQAADv3Bj2PD5jJ/WcBO/cF/Y8PmMn9Znl0Jv3xGhsm5YtWN6TkdnGyfNZ2VdcZa8q10bcumunlp5nqbmcUo7Qyo4mRi+j2XcypnC3tYSmot8stYpx1Senf16eJz/AIve2rvs8f6MTCbnTcdqYbj3/wCIYkfud0U/ybJ4zFdc41bDhdgemqKV+HOtOSXWVE5qLg/NJyUvdo/Nl4K7EhTgemuP/HzJ2JSa6xohNxjFeSbi5e/VeSNg4jr/AKNl/LSf36ovDlabHxNP/Fg/verZN9DXN8+KUdnZUsTHxfSLKeVXTnb2UIzcU+SOkW5NJrXu8vA9ncTiRDat7xbcb0e9wlZW42drXYo/tR6pNS06+PczjW983LaeY29X/iGYuvkrpJL8EjNcI/bVH+TI+jM14zB0vjV7IfzWP/Vmb4d+x8T5Sv8AoYTjV7IfzWP/AFZmuHXsfE+UrM/g4Bvd7Ty/n8r60jf+Af77M+yw/wBVxoG9z/6ll/P5X1pG/cAv32Z9lh/quNXpDj5+/wAT7HK/VUXgTslTtvzpLXslHFqflKSUrH8dOz/Fk4+fv8P7HK/VUbTwXpUdjxml1uycmyXvanyf0gifKtN47fx1Hyb+rI23gj7Kl87d+mBqXHf+Oo+Tf1ZG28EPZMvnbv0wF/kebi5u5k7SxKvQ4K2zHyHbKrmUXOLhKOsdejkte7p0b+DwHCLdLOw8uzKy6ZY9fo8qIxnJc1kpTg9dE3oly+PmZnjPtTIxMGieLfbROefGuUqZuEnD0e58ra8NYp/cYLgztzLy8y+GVl5F8IYsZRjdY5qMu0S1SfiPeDSOJPtnL+2h9Gs6XtLcue2tl7O5MmGP6Pg1t81Tt5uemryktNOX8zmnEn21l/bQ+jWd83N9l4nyGL9KIvUHDt9OH+TsitXTtqyMeU1W7K4uDhNp6KUHronp36vr5dDdOCW8tlys2dfNz7CtX4zk9ZRq5lGdevknKGn+ZruSNj4vxT2Hka+E8Rr4+l1HM+C0tNsL34mQn8NYP+yHcG18ddkKVFOdFetTY8a1rxqn1i38JLRf52caPo7ihQrNi5SaXqVwtWvg4WRl/Y+cS8ekAAaAAAQEAFO/8F/Y0PmMn9Z8/nf+C3saHzGT9Qzy6HOeKmJbdty+NNN10lVjycaapWyUeyj1ainoj9cNd0sy3aVN9uJfRj4tqvssyKpUpyitYRippOT5uXu7kmbVmbx42y95su7MlONdmFj1RcK3Y+flqfcvcmZTL4v7MhHWtZd0tOkY08nX4zaJtxXv8XM5UbGuTa5siVWPBPxcppy/0xm/uP1wlzlfsahJrmo7XHmk9eVwsfL+MHB/ecZ323xv2zcpWRVVFWvYURlzKOvfOUv5pP4LRdPNu7kb5X7Gtcq4q7Hta7aiUuVSa7pxl/LJfB6rp5NPH0Pf4j7r5WPtK+yGLfZj5N08iq2mqVsXz+tOMnFPlkpOXR/Ey/B/drKW0FmW491GPj126SurdXaWTjyqMVJJtaNvXu6G3YvF/Zk462Ry6ZadYyp5+vxg2eN8Ydn9rGCryuyfN2l0q9FHo9NIJuUm3ou5d4250PZ41eyH81j/ANWZXhndGzY2K4tNRo7N6eEoSlGS/FM0PiTv5gbS2e8bFstla76bNJ0yguWL69WjWNw9/btj61Ov0jDslzyq5uWdc9EnOuXd106p9H5rrqz0PHvvu3m1bSyJehZU67sq66qymiVsJwnNyXrRTWvXRrvN84I7BycVZORk0WUQyFj11Rug67Jcjscpcj6pevHTXv6mSx+L2zJLWay6np1jKjma92sW0Z3dXfPF2vO2GIrv+XjXKbtr5E1NyS066/yMW3Bz3j5+/wAP7HK/VUbTwVyFPY8YJpujJyK5e5ufaf0sRqvH39/h/Y5X6qicCdsKF9+DN6dvGOTSvOyC5bF8XHkf/wAsfI8PHj+Ox/k39WRnODu3MTH2bKvIzMaixZdsuS++NUuVwhpLSTWq7/wNh4ibkrbNUHC1U5WO5dlOS1hKEtOauWnVLommu7TuepzC7hDtVpxXoT1TSfpEtPpiZZg3Pjy9dnY7XVPaMNGvH/lrzXuA/wDHZHykfqoz3HSPLszFT71tCtP4rFvMDwH/AI7I+Uj9VD5GucUaJV7ayeZadpOqyPvi6YdfxTX3HY+Hm38a/ZmPGORSraMaqi6uU1GcLIQUXrFvXR6arzR+N/dw6dsqNisePl1R5IWqPPGcNW+zsjqtVq2009Vq+/XQ5lk8INpp6R9Ctj4NXNa/dKHQerBuPGbeLH/w94Nd1dt+RbS5QrmpuuuuanzS07usIpeevuNa4F4Ep7QtyNH2ePiutvTp2ls48q1+Fc/yPzszg3nTklkX4mPXqtXW5Xz090dIr8zru7G71GysZY2Mnyp885z62W2NLWcmvHou7okkhskwYrilkKrYuS2/264VL3udkY/3PnE7Fx32yo1UYEX61k3lWpeFcNYwT+Mm3/8ABxwvHpFBAaFBABAQAU+gOC3saHzGT9Rnz8eWvInFaRssivKM3FfgmSzRt/F/23d9njfRiaYWc3J6yk5Pxcnq/wAWfkQUEBRQQAUEAGU3Zw4ZOfj0XJyqvyqarIqTi3CU0mtV1XTyPozdzdTC2T2jwqXU7uTtZTuna2oa8q1nJ6Jc0u7zPmCMmnqm011TT0afmfuzInJaSsslF96lNyT+5szZo3zjLt6nNzq68eyNsMOqdc7IPmi7ZyTlFNd+ijH7214GlbL2hZiZFeTRLluosjZB+Da74v3Nap+5s9QFwfU+7O3qdp4sMqh+rNaTg361Vq/arl71+a0fczKnzHuZvZfsfI7Wn16bNFfRJ6RtivFf9s14P+qPoPdjefF2rV2uJbq0v+JVP1ban5Tj/ddH4NmLMVpnHv2dj/8Asof7bINd4Dfx2R8pH6qNh4+ezsf/ANlD/bZBr3AX+OyPlI/VRfkduABgD0tsbUpwceeTkz5KaY80n4vyil4yb0SXi2eLb23cbZ1LvzLo1QWqin1nZL/thFdZP4Hz/v3vtdtm1ap04dUm6KNdXr3dpY13z0+5a6LxbsmjEbx7as2ll2Zd3SVsvVguqrqXSFa+C/F6vxMaQHRFBAUUEAEBABQQAUEAFBABQQAUEAFBABQQAU82JlWUWK2i2ym2D1jZVNwmvvXh/U8AA2TeDfTM2liV4ubKu1UXxvjcoclspKucNJaeq+k2+iXce7w03ro2Pk23ZNd9kLqFVH0eMZNNTT1fNKPTp4amnAmDuV/GnBX7vD2hN+HNGqEfx7Vv8jW9s8ZMu1OOHjU4qfTtLJekWfFLRRT+KZzEE8YPb2jtG/Lsd2VfZfa++dsuZpeS8Ir3LRHqkBoUEAFBABQTUoEBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAUEAEBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAUEAFBABQQAUEAEBCkAEAFBCgACAUAgFAIBQCAUEKABABQQAUEAFBABQCAUEAFAIABNRqBQTUagUE1GoFBNRqBQTUagUE1GoFBNRqBQTUagUE1GoFBNRqBQTUagUE1GoFBNRqBQTUagUE1IBtAAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//2Q==" alt="paypal" height="200">

        <span class="text-red-600">Régler par Lydia ou Paylib: 06 83 05 90 70</span>
      </UCard>

      <template #footer>
        <UButton
            @click="workshopStore.reservationModalPaiement = false"
        >Fermer</UButton>
      </template>
    </UCard>
  </UModal>
</template>
