<x-admin-layout>
  <div class="">
    <div class="my-8">
      <h1 class="text-xl font-bold">Selamat Datang Admin</h1>
      <h2 class="">your daily stats</h2>
    </div>

    <div class="grid grid-cols-2 gap-3 md:gap-6 md:grid-cols-4">
      <div class="resume-dashboard ">
        <div class="w-5 h-5 bg-red-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Kategori Budaya</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ "8 Kategori" }}</h2>
        </div>
      </div>
      <div class="resume-dashboard ">
        <div class="w-5 h-5 bg-yellow-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Konten Daerah</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ "8 Daerah" }}</h2>
        </div>
      </div>
      <div class="resume-dashboard">
        <div class="w-5 h-5 bg-green-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Soal Kuis</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ "40 Soal" }}</h2>
        </div>
      </div>
      <div class="resume-dashboard">
        <div class="w-5 h-5 bg-blue-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Konten Budaya</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ "18 Konten" }}</h2>
        </div>
      </div>

    </div>

    <div class="grid justify-center p-5 mt-10 rounded-md shadow-md bg-tertiary">
      <h1 class="mt-5 mb-10 text-xl font-bold text-center">Diagram Konten</h1>
      <div class="max-w-sm">
        <canvas id="diagram-konten" class="w-full cursor-pointer "></canvas>
      </div>
    </div>

    <x-content-budaya></x-content-budaya>
    <x-content-daerah></x-content-daerah>




  </div>
</x-admin-layout>
