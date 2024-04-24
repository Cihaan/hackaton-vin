<template>
    <section class="flex flex-col justify-center p-10">
      <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 h-4/5 lg:h-auto">
        <div class="flex flex-col items-center gap-4">
          <div class="flex flex-col gap-4 lg:w-3/4 xl:w-2/3">
            <h2 class="text-wine-600 text-5xl font-bold">Qu'est-ce qu'un Atelier de vin</h2>
            <p class="text-black text-lg mt-4">À un atelier de dégustation de vin, les participants ont la chance d'explorer et d'approfondir leur connaissance du vin à travers une série d'activités interactives. Sous la guidance d'un sommelier ou d'un expert en vin, les participants apprennent à observer visuellement les vins, à sentir leurs arômes complexes, à savourer les différentes saveurs en bouche, et à discuter de leurs impressions avec les autres participants. Ces ateliers offrent souvent une opportunité unique d'explorer une variété de cépages, de régions viticoles et de styles de vin, permettant ainsi aux participants de développer leurs compétences en dégustation et leur palais. De plus, certains ateliers peuvent inclure des conseils sur l'art d'associer les vins avec les plats pour créer des expériences gastronomiques harmonieuses. En résumé, un atelier de dégustation de vin offre une expérience enrichissante et sensorielle où les amateurs de vin peuvent élargir leurs horizons et approfondir leur appréciation du vin.</p>
            <!-- <UButton
                class="rounded-none w-full sm:w-4/5 lg:w-3/4 xl:w-2/3"
                color="primary"
                :trailing="false"
            >
              <span class="text-secondary-50 mx-auto text-xl">S'inscrire à un Atelier</span>
            </UButton> -->
            <a href="#_" class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium bg-primary-500 text-secondary-600 transition duration-300 ease-out border-2 border-primary-500 rounded-lg shadow-md group">
            <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-secondary-500 group-hover:translate-x-0 ease border-secondary-500">
    
            <img src="~/public/wine-share.png" alt="Icon" class="w-6 h-6">
            </span>
            <span class="absolute flex items-center justify-center w-full h-full text-secondary-500 transition-all duration-300 transform group-hover:translate-x-full ease">S'inscrire à un Atelier</span>
            <span class="relative invisible">S'inscrire à un Atelier</span><!-- Change les dimensions du bouton -->
            </a>
          </div>
        </div>
        <div>
            <img src="~/public/img/atelier1.png" alt="degustation-vin" class="w-50 h-96 object-cover mt-20 ml-10 lg:ml-40 shadow-md">
            <img src="~/public/img/atelier2.png" alt="degustation-vin" class="w-50 h-96 object-cover -mt-10 ml-40 lg:ml-60 shadow-lg">
        </div>
       
      </div>
    </section>
  </template>
  