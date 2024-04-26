<template>
  <section class="h-fit flex flex-col justify-center bg-primary text-white pt-8 pb-24 px-12">
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-24">
      <!-- Image column (1/3) -->
      <div class="col-span-1 lg:col-span-1 flex justify-center items-center ">
        <div class="relative w-full">
          <img src="~/public/MR.png" class="w-full justify-center h-auto lg:h-88 object-cover max-w-80" alt="Animateur image">
        </div>
      </div>
      <!-- Description column (2/3) -->
      <div class="col-span-1 lg:col-span-2 flex flex-col justify-start">
        <div class="flex flex-col items-center lg:items-start gap-4">
          <h2 class="text-secondary-500 text-5xl font-bold">Animateur</h2>
          <p class="underline underline-offset-4 font-bold mb-4">BONNETON Olivier</p>
          <p class="text-lg leading-relaxed">
            Ma pratique : Faire (re)découvrir les Sciences sous de nouveaux angles (historiques, humains, ludiques, ...)
            et lier celles-ci à l'Actualité et au Monde d'aujourd'hui et de demain. L'évolution rapide des IA (Midjourney,
            Dall-e, Chat GPT, Avia, Stable Diffusion,...) en est un parfait exemple et se trouve au coeur de mes
            différents cours pour illustrer l'interaction entre Connaissances et Applications pratiques.
          </p>
          <p class="text-lg leading-relaxed">
            MOOCS & CERTIFICATIONS :
            - Défis et enjeux de la Cybersécurité (Université Bretagne Sud) Score 84 %
            - Exercer son esprit critique : données et raisonnements fallacieux Score 116 % ;-)
            - La science moderne de la Renaissance aux Lumières (Université Paris 1 Panthéon Sorbonne) Score 86 %
            - Deep Learning (CNAM) Score 78 %
            - Introduction à la statistique par R (Université Paris Sud) Score 96 %
            - La Science Fiction : (Université d'Artois) Score 96 %
          </p>
        </div>
      </div>
    </div>
  </section>
</template>
