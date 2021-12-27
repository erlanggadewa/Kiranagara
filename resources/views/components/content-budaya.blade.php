<div class="grid w-full grid-cols-2 gap-5 pb-3 mt-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
  <!-- arbab -->
  <div x-data="{'open' : false}" class="cursor-pointer">
    <div @click="open = !open"
      class="flex flex-col items-center h-full p-5 duration-100 transform hover:scale-105 hover:shadow-2xl hover:ring-4 rounded-2xl justify-evenly"
      style="background-color: #c4c4c44d">
      <img src="images/alat_musik/Arbab.png" alt="" class="h-3/5 lg:h-3/5" />
      <h1 class="mt-2 font-semibold text-green-800">Arbab</h1>
    </div>

    <!-- detail -->
    <div x-show="open">
      <div class="absolute inset-0 z-50 flex items-center justify-center cursor-default "
        style="background-color: rgba(128, 128, 128, 0.541)">
        <div
          class="flex flex-col items-center justify-center w-4/5 py-5 duration-300 bg-white hover:transform hover:scale-105 hover:ring-4 hover:shadow-2xl h-4/5 lg:w-3/4 lg:h-3/4 rounded-3xl lg:flex-row-reverse"
          @click.outside="open = !open">
          <img src="images/alat_musik/Arbab.png" alt="" class="p-5 lg:ml-3 lg:mr-10 lg:w-2/3 h-1/2 lg:h-4/5" />
          <div class="items-center justify-center mt-5 overflow-y-hidden lg:flex lg:flex-col">
            <h1 class="mb-2 text-2xl font-medium text-center text-green-800 md:text-3xl">
              Arbab - Sumatera
            </h1>
            <p class="block mt-4 overflow-y-auto text-sm text-justify lg:text-base px-7 lg:px-10 h-4/5 lg:max-h-96">
              &emsp;&emsp;&emsp;Instrumen ini terdiri dari 2 bagian yaitu
              Arbabnya sendiri (instrumen induknya) dan penggeseknya dalam
              bahasa daerah disebut Go Arab. Instrumen ini memakai bahan
              tempurung kelapa, kulit kambing, kayu dan dawai.
              <br />
              <br />
              &emsp;&emsp;&emsp;Musik Arbab pernah berkembang di daerah
              Pidie, Aceh Besar dan Aceh Barat. Arbab ini dipertunjukkan
              pada acara-acara keramaian rakyat, seperti hiburan rakyat,
              pasar malam dan sebagainya. Sekarang ini tidak pernah
              dijumpai arbab ini, diperkirakan sudah mulai punah. Terakhir
              kesenian ini dapat dilihat pada zaman pemerintahan Belanda
              dan pendudukan Jepang.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- angklung -->
  <div x-data="{'open' : false}" class="cursor-pointer">
    <div @click="open = !open"
      class="flex flex-col items-center h-full p-5 duration-100 transform hover:scale-105 hover:shadow-2xl hover:ring-4 rounded-2xl justify-evenly"
      style="background-color: #c4c4c44d">
      <img src="images/alat_musik/angklung.png" alt="" class="h-3/5 lg:h-3/5" />
      <h1 class="mt-2 font-semibold text-green-800">Angklung</h1>
    </div>

    <!-- detail -->
    <div x-show="open">
      <div class="absolute inset-0 z-50 flex items-center justify-center cursor-default "
        style="background-color: rgba(128, 128, 128, 0.541)">
        <div
          class="flex flex-col items-center justify-center w-4/5 py-5 duration-300 bg-white hover:transform hover:scale-105 hover:ring-4 hover:shadow-2xl h-4/5 lg:w-3/4 lg:h-3/4 rounded-3xl lg:flex-row-reverse"
          @click.outside="open = !open">
          <img src="images/alat_musik/angklung.png" alt="" class="p-5 lg:ml-3 lg:mr-10 lg:w-1/2 h-1/2" />
          <div class="items-center justify-center mt-5 overflow-y-hidden lg:flex lg:flex-col">
            <h1 class="mb-2 text-2xl font-medium text-center text-green-800 md:text-3xl">
              Angklung - Jawa Barat
            </h1>
            <p class="block mt-4 overflow-y-auto text-sm text-justify lg:text-base px-7 lg:px-10 h-4/5 lg:max-h-96">
              &emsp;&emsp;&emsp;Angklung alat musik tradisional dari Jawa
              Barat ini telah mendunia. Angklung terbuat dari bilah -
              bilah bambu yang disusun sedemikian rupa sehingga saat
              digetarkan atau digoyangkan menghasilkan bunyi yang khas.
              Untuk mendapatkan nada yang harmonis, angklung harus
              dimainkan oleh banyak orang. Sebab satu angklung hanya
              mewakili satu tangga nada saja.
              <br />
              <br />
              &emsp;&emsp;&emsp;Angklung termasuk salah satu pesona budaya
              Indonesia yang menjadi daya tarik wisatawan mancanegara.
              Terlebih, UNESCO telah mengakui angklung sebagai Warisan
              Budaya Dunia, dan masuk dalam daftar
              <em>List of the Intangible Cultural Heritage of Humanity</em>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Kacapi -->
  <div x-data="{'open' : false}" class="cursor-pointer">
    <div @click="open = !open"
      class="flex flex-col items-center h-full p-5 duration-100 transform hover:scale-105 hover:shadow-2xl hover:ring-4 rounded-2xl justify-evenly"
      style="background-color: #c4c4c44d">
      <img src="images/alat_musik/Kecapi.png" alt="" class="h-3/5 lg:h-3/5" />
      <h1 class="mt-2 font-semibold text-green-800">Kacapi</h1>
    </div>

    <!-- detail -->
    <div x-show="open">
      <div class="absolute inset-0 z-50 flex items-center justify-center cursor-default "
        style="background-color: rgba(128, 128, 128, 0.541)">
        <div
          class="flex flex-col items-center justify-center w-4/5 py-5 duration-300 bg-white hover:transform hover:scale-105 hover:ring-4 hover:shadow-2xl h-4/5 lg:w-3/4 lg:h-3/4 rounded-3xl lg:flex-row-reverse"
          @click.outside="open = !open">
          <img src="images/alat_musik/Kecapi.png" alt="" class="p-5 lg:ml-3 lg:mr-10 lg:w-1/2 h-1/2" />
          <div class="items-center justify-center mt-5 overflow-y-hidden lg:flex lg:flex-col">
            <h1 class="mb-2 text-2xl font-medium text-center text-green-800 md:text-3xl">
              Kacapi - Jawa Barat
            </h1>
            <p class="block mt-4 overflow-y-auto text-sm text-justify lg:text-base px-7 lg:px-10 h-4/5 lg:max-h-96">
              &emsp;&emsp;&emsp;Kacapi termasuk jenis waditra alat petik,
              karena bunyi suara yang dihasilkan bersumber dari bahan
              kawat atau dawai yang dimainkan dengan cara dipetik. Dalam
              istilah musik sunda, teknik dasar petikan kacapi dikenal
              mempunyai cara - cara khas seperti ditoel, disintreuk, dan
              digembyang (diranggeum). Menurut fungsinya, waditra kacapi
              dimainkan sebagai :
              <br />
              <br />
              &emsp;&emsp;&emsp;1. Kacapi Indung : diartikan Kacapi Ibu
              atau Induk karena dalam penyajiannya kacapi indung berperan
              sebagai induk atau sumber dari waditra yang menjadi
              pasangannya. Jika dilihat dari pola iringan, kacapi selalu
              berperan sebagai pemberi arah untuk permainan kacapi rincik
              maupun permainan suling.
              <br />
              <br />
              &emsp;&emsp;&emsp;2. Kacapi Rincik yaitu kacapi berukuran
              kecil yang bentuknya hampir sama dengan kacapi indung. Kata
              "Rincik" artinya kecil. Petikan kacapi rincik mempergunakan
              tempo atau ritme yang pendek-pendek dan cepat. Pada dasarnya
              petikan Kacapi Rincik merupakan kelipatan dari pada petikan
              kacapi indung.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tifa -->
  <div x-data="{'open' : false}" class="cursor-pointer">
    <div @click="open = !open"
      class="flex flex-col items-center h-full p-5 duration-100 transform hover:scale-105 hover:shadow-2xl hover:ring-4 rounded-2xl justify-evenly"
      style="background-color: #c4c4c44d">
      <img src="images/alat_musik/tifa.png" alt="" class="h-3/5 lg:h-3/5" />
      <h1 class="mt-2 font-semibold text-green-800">Tifa</h1>
    </div>

    <!-- detail -->
    <div x-show="open">
      <div class="absolute inset-0 z-50 flex items-center justify-center cursor-default "
        style="background-color: rgba(128, 128, 128, 0.541)">
        <div
          class="flex flex-col items-center justify-center w-4/5 py-5 duration-300 bg-white hover:transform hover:scale-105 hover:ring-4 hover:shadow-2xl h-4/5 lg:w-3/4 lg:h-3/4 rounded-3xl lg:flex-row-reverse"
          @click.outside="open = !open">
          <img src="images/alat_musik/tifa.png" alt="" class="mt-5 lg:ml-3 lg:mr-10 lg:w-1/2 h-1/2" />
          <div class="items-center justify-center mt-5 overflow-y-hidden lg:flex lg:flex-col">
            <h1 class="mb-2 text-2xl font-medium text-center text-green-800 md:text-3xl">
              Tifa - Sumatra
            </h1>
            <p class="block mt-4 overflow-y-auto text-sm text-justify lg:text-base px-7 lg:px-10 h-4/5 lg:max-h-96">
              &emsp;&emsp;&emsp; Tifa berasal dari timur Indonesia
              tepatnya daerah Papua dan Maluku, tifa merupakan alat musik
              tradisional khas Indonesia yang memiliki bentuk seperti
              tabung dan dimainkan dengan cara dipukul. Tifa terbagi dalam
              beberapa jenis, yakni jekir, potong, dasar, dan bas. Umumnya
              tifa digunakan saat upacara adat, pertunjukan musik, dan
              mengiringi tarian tradisional.
              <br />
              <br />
              &emsp;&emsp;&emsp; Secara bentuk, ada sedikit perbedaan
              antara tifa Maluku dan tifa Papua. Di Maluku, tifa memiliki
              bentuk tabung dan tidak diberi pegangan. Sedangkan di Papua
              bagian tengah tifa dibuat lebih melengkung, serta terdapat
              pegangan pada bagian tengah tifa.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- sasando -->
  <div x-data="{'open' : false}" class="cursor-pointer">
    <div @click="open = !open"
      class="flex flex-col items-center h-full p-5 duration-100 transform hover:scale-105 hover:shadow-2xl hover:ring-4 rounded-2xl justify-evenly"
      style="background-color: #c4c4c44d">
      <img src="images/alat_musik/Sasando.png" alt="" class="h-3/5 lg:h-3/5" />
      <h1 class="mt-2 font-semibold text-green-800">Sasando</h1>
    </div>

    <!-- detail -->
    <div x-show="open">
      <div class="absolute inset-0 z-50 flex items-center justify-center cursor-default "
        style="background-color: rgba(128, 128, 128, 0.541)">
        <div
          class="flex flex-col items-center justify-center w-4/5 py-5 duration-300 bg-white hover:transform hover:scale-105 hover:ring-4 hover:shadow-2xl h-4/5 lg:w-3/4 lg:h-3/4 rounded-3xl lg:flex-row-reverse"
          @click.outside="open = !open">
          <img src="images/alat_musik/Sasando.png" alt="" class="mt-5 lg:ml-3 lg:mr-10 lg:w-1/2 h-1/2" />
          <div class="items-center justify-center mt-5 overflow-y-hidden lg:flex lg:flex-col">
            <h1 class="font-medium text-center text-green-800">
              Sasando - NTT
            </h1>
            <p class="block mt-4 overflow-y-auto text-sm text-justify lg:text-base px-7 lg:px-10 h-4/5 lg:max-h-96">
              &emsp;&emsp;&emsp; Sasando adalah salah satu alat musik
              tradisional dari Pulau Rote, Nusa Tenggara Timur (NTT).
              Sasando ini merupakan alat musik berdawai tanpa mempunyai
              cord dan dimainkan dengan cara dipetik dengan menggunakan
              jari. Alat musik satu ini hampir sama dengan alat musik
              tradisional seperti Kecapi atau Harpa, namun memiliki bentuk
              dan suara yang sangat khas. Sasando merupakan salah satu
              alat musik yang sangat terkenal, tidak hanya di Indonesia
              saja, namun juga sampai luar negeri.
              <br />
              <br />
              &emsp;&emsp;&emsp; Walaupun merupakan alat musik yang
              dimainkan dengan cara dipetik, namun sasando memiliki cara
              yang berbeda dengan alat musik petikan lainnya. Sasando
              biasanya dimainkan menggunakan kedua tangan dengan arah yang
              berlawanan. Tangan kanan berperan untuk memainkan
              <em>accord</em>, sedangkan tangan kiri sebagai melodi atau
              <em>bass</em>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
