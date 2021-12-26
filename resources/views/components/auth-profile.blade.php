<div class="flex items-center justify-end gap-4">
  <div class="hidden text-right md:block justify-self-end ">
    <h1 class="font-bold">{{ Auth::user()->name }}</h1>
    <h2 class="text-sm uppercase">{{ Auth::user()->role }}</h2>
  </div>
  <img class="w-12 h-12 rounded-full" src="{{ asset('img/profil_square.jpg') }}" alt="">
</div>
