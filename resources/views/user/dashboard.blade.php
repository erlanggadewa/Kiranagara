<x-user-layout>
  <div>
    <h1 class="mt-6 text-lg font-bold uppercase md:text-xl text-primary">BUDAYA</h1>
    <hr class="w-2/5 mt-4 border shadow-sm border-primary bg-primary">

    <div class="flex gap-5 px-4 py-8 overflow-x-auto md:px-5 snap-x">
      @foreach ($cultureCategories as $cultureCategory)
        <a href="{{ route('budaya-user', $cultureCategory->id) }}">
          <div
            class="snap-center shrink-0 cursor-pointer hover:shadow-secondary hover:shadow-xl hover:scale-105 duration-200 hover:ring hover:ring-secondary border border-secondary rounded-xl shadow-lg p-4 w-52 md:w-60 aspect-[5/4] "
            style="background-color: rgba(215, 226, 232,0.4)">
            <img
              src="
            {{ $cultureCategory->img != 'no-img.png' ? asset('img/budaya/kategori/' . $cultureCategory->img) : asset('img/' . $cultureCategory->img) }}"
              alt="{{ $cultureCategory->img }}" class="object-cover aspect-[3/2] rounded-md shadow-sm">
            <h1 class="mt-4 text-base font-bold text-center md:text-base">{{ $cultureCategory->name }}</h1>
          </div>
        </a>
      @endforeach
    </div>

  </div>

  <div>
    <h1 class="mt-6 text-lg font-bold uppercase md:text-xl text-primary">Daerah</h1>
    <hr class="w-2/5 mt-4 border shadow-sm border-primary bg-primary">


    <div class="flex gap-5 px-4 py-8 overflow-x-auto md:px-5 snap-x">
      @foreach ($regions as $region)
        <a href="">
          <div
            class="snap-center shrink-0 cursor-pointer hover:shadow-secondary hover:shadow-xl hover:scale-105 duration-200 hover:ring hover:ring-secondary border border-secondary rounded-xl shadow-lg p-4 w-52 md:w-60 aspect-[5/4] "
            style="background-color: rgba(215, 226, 232,0.4)">
            <img src="
            {{ $region->img != 'no-img.png' ? asset('img/daerah/' . $region->img) : asset('img/' . $region->img) }}"
              alt="{{ $region->name }}" class="object-cover aspect-[3/2] rounded-md shadow-sm">
            <h1 class="mt-4 text-base font-bold text-center md:text-base">{{ $region->name }}</h1>
          </div>
        </a>
      @endforeach
    </div>

  </div>
</x-user-layout>
