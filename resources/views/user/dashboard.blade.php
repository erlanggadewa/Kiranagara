<x-user-layout>

  {{-- Hero Section --}}
  <div class="w-full bg-white ">

    <div class=" sm:mt-5">
      <div class="items-center hidden gap-10 lg:gap-40 md:flex jumbotron">
        <div class="">
          <h1 class="hidden text-3xl font-medium text-green-800 uppercase md:block">
            Kiranagara
          </h1>
          <p class="text-base font-medium text-justify indent-14 mt-7 md:text-sm">
            Kiranagara merupakan sebuah platform belajar online gratis yang
            membahas mengenai kebudayaan yang ada di Indonesia. Kirana berasal
            dari bahasa sastra Indonesia yang berarti cantik dan Nagara berarti
            Negara. Jadi arti dari Kiranagara adalah negara yang cantik. Banyak
            harapan dengan diciptakannya website e-learning ini, salah satunya
            ialah dapat meningkatkan ilmu pengetahuan para generasi bangsa
            mengenai kebudayaan yang ada di Indonesia melalui perkembangan
            teknologi ini yaitu berbasis web
          </p>
        </div>
        <img src="{{ asset('img/logoKiranagara.png') }}" class="w-56 h-56 lg:mr-20 aspect-square" alt="" />
      </div>

      <!-- borobudur -->
      <div class="grid items-center w-full gap-4 p-10 mt-10 lg:grid-cols-2 sm:mt-20 xl:mt-16 sm:p-10 rounded-3xl"
        style="background-color: #d7e2e871">
        <div>
          <img class="" src="{{ asset('img/borobudur.png') }}" alt="Borobudur">
        </div>

        <div class="flex flex-col items-end p-4 sm:mt-6 lg:mt-0 lg:p-0 lg:text-right lg:w-4/5 lg:ml-16">
          <h1 class="text-lg font-medium text-green-800 lg:text-2xl lg:mb-5">
            Hallo, Kiraners
          </h1>
          <p class="mt-2 text-sm font-medium text-justify sm:mt-0">
            Indonesia merupakan negara yang begitu indah dan menyimpan banyak
            kekayaan di dalamnya. Keanekaragaman yang ada di Indonesia menjadi
            salah satu ciri khas sebagai negara yang unik, tetapi keanekaragaman
            tersebut tidak menjadi penghalang untuk rakyatnya tetap saling
            menghargai bahkan merasa bangga atas keanekaragaman itu sendiri. 273.5
            juta jiwa yang menempati negara Indonesia yang terdiri dari bayi
            hingga lansia terutama para pemuda sebagai generasi bangsa harus
            menyadari betapa indahnya negara kita, salah satu cara untuk kita
            melestarikan budaya Indonesia dengan mengingatnya dan menjaganya.
          </p>
        </div>
      </div>
    </div>
  </div>

  {{-- Budaya --}}
  <div class="mt-14">
    <h1 class="mt-6 text-lg font-bold uppercase md:text-xl text-primary">BUDAYA</h1>
    <hr class="mt-2 border-2 bg-green-800 border-green-800 w-1/2" />

    @if ($cultureCategories->count())
      <div class="flex gap-5 px-4 py-8 overflow-x-auto md:px-5 snap-x">
        @foreach ($cultureCategories as $cultureCategory)
          <a href="{{ route('budaya-user', $cultureCategory->id) }}">
            <div
              class="snap-center shrink-0 cursor-pointer hover:shadow-slate-400 hover:shadow-lg hover:scale-105 duration-200 hover:ring hover:ring-slate-500 border border-secondary rounded-xl shadow-md p-4 w-52 md:w-60 aspect-[5/4] "
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
    @else
      <div class="alert alert-error mt-5">
        <div class="flex-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
            </path>
          </svg>
          <label>Kategori Budaya Kosong!</label>
        </div>
      </div>
    @endif

  </div>

  {{-- Daerah --}}
  <div>
    <h1 class="mt-6 text-lg font-bold uppercase md:text-xl text-primary">Daerah</h1>
    <hr class="mt-2 border-2 bg-green-800 border-green-800 w-1/2" />


    @if ($regions->count())
      <div class="flex gap-5 px-4 py-8 overflow-x-auto md:px-5 snap-x">
        @foreach ($regions as $region)
          <a href="{{ route('daerah-user', $region->id) }}">
            <div
              class="snap-center shrink-0 cursor-pointer hover:shadow-emerald-200 hover:shadow-lg hover:scale-105 duration-200 hover:ring hover:ring-emerald-500 border border-secondary rounded-xl shadow-md p-4 w-52 md:w-60 aspect-[5/4] "
              style="background-color: #D6EDED">
              <img src="
            {{ $region->img != 'no-img.png' ? asset('img/daerah/' . $region->img) : asset('img/' . $region->img) }}"
                alt="{{ $region->name }}" class="object-cover aspect-[3/2] rounded-md shadow-sm">
              <h1 class="mt-4 text-base font-bold text-center md:text-base">{{ $region->name }}</h1>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div class="alert alert-error mt-5">
        <div class="flex-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
            </path>
          </svg>
          <label>Data Daerah Kosong!</label>
        </div>
      </div>
    @endif


  </div>

  {{-- Kuis --}}
  <div class="kuis mt-10 sm:mt-10" id="kuis">
    <h1 class="mt-6 text-lg font-bold uppercase md:text-xl text-primary">Kuis</h1>
    <hr class="mt-2 border-2 bg-green-800 border-green-800 w-1/2" />
    <div class="mt-6 grid md:grid-cols-2 w-full gap-7 overflow-x-auto pb-3">
      <a href="{{ route('quiz-user', 'easy') }}">
        <div class="easy h-20  rounded-3xl flex items-center">
          <img src="{{ asset('img/star_kuis.png') }}" alt="" class="aspect-square w-10 ml-10" />
          <span class="ml-5 text-lg sm:text-2xl text-white">Easy</span>
        </div>
      </a>

      <a href="{{ route('quiz-user', 'medium') }}">
        <div class="medium h-20  rounded-3xl flex items-center">
          <img src="{{ asset('img/star_kuis.png') }}" alt="" class="aspect-square w-10 ml-10" />
          <span class="ml-5 text-lg sm:text-2xl text-white">Medium</span>
        </div>
      </a>

      <a href="{{ route('quiz-user', 'hard') }}">

        <div class="hard h-20  rounded-3xl flex items-center">
          <img src="{{ asset('img/star_kuis.png') }}" alt="" class="aspect-square w-10 ml-10" />
          <span class="ml-5 text-lg sm:text-2xl text-white">Hard</span>
        </div>
      </a>

      <a href="{{ route('quiz-user', 'expert') }}">
        <div class="expert h-20  rounded-3xl flex items-center">
          <img src="{{ asset('img/star_kuis.png') }}" alt="" class="aspect-square w-10 ml-10" />
          <span class="ml-5 text-lg sm:text-2xl text-white">Expert</span>
        </div>
      </a>
    </div>
  </div>

</x-user-layout>
