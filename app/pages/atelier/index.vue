<template>
    <div class="min-h-screen flex items-center justify-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-semibold text-primary mb-8">Liste des Ateliers</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="(atelier, index) in ateliers" :key="index" class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img :src="atelier.photo" :alt="atelier.titre" class="w-full h-48 object-cover">
            <div class="p-6">
              <h2 class="text-xl font-semibold text-gray-800">{{ atelier.titre }}</h2>
              <p class="text-sm text-gray-600 mb-4">{{ atelier.descriptif }}</p>
              <p class="text-base font-semibold text-primary mb-2">{{ atelier.prix }}</p>
              <p class="text-sm text-gray-600">{{ atelier.date }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  

  <script>
  export default {
    data() {
      return {
        ateliers: [
          {
            titre: 'Atelier 1',
            descriptif: 'Description de l\'atelier 1',
            prix: '$20',
            date: '20 avril 2024',
            photo: 'chemin/vers/photo1.jpg'
          },
          {
            titre: 'Atelier 2',
            descriptif: 'Description de l\'atelier 2',
            prix: '$30',
            date: '25 avril 2024',
            photo: 'chemin/vers/photo2.jpg'
          },
          {
            titre: 'Atelier 3',
            descriptif: 'Description de l\'atelier 3',
            prix: '$25',
            date: '30 avril 2024',
            photo: 'chemin/vers/photo3.jpg'
          }
        ]
      };
    }
  }
  </script>
  