<x-admin-layout>
  <div class="mt-6 border shadow border-secondary bg-tertiary sm:rounded-lg">
    <div class="sticky top-0 z-50 px-4 py-5 shadow-md bg-tertiary sm:px-6">

      <div class="flex justify-between ">
        <div>
          <h3 class="text-lg font-medium leading-6 text-gray-900">
            Informasi Kuis
          </h3>
          <p class="max-w-2xl mt-1 text-sm text-gray-500 capitalize md:text-base">
            Level {{ $detailData->level }}
          </p>
        </div>
        <a href="{{ route('dashboard-admin') }}">
          <button
            class="px-4 py-2 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-yellow-500 rounded shadow outline-none active:bg-pink-600 hover:shadow-md focus:outline-none">
            Back
          </button>
        </a>
      </div>
    </div>
    <div class="px-4 py-5 sm:px-6">
      <div class="mt-5 border-t border-gray-200">
        <dl>
          <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Level
            </dt>
            <dd class="mt-1 text-sm text-gray-900 capitalize md:text-base sm:mt-0 sm:col-span-2">
              {{ $detailData->level }}
            </dd>
          </div>
          <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Waktu Dibuat
            </dt>
            <dd class="mt-1 text-sm text-gray-900 md:text-base sm:mt-0 sm:col-span-2">
              {{ $detailData->created_at }}
            </dd>
          </div>
          <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Terakhir Diperbaharui
            </dt>
            <dd class="mt-1 text-sm text-gray-900 md:text-base sm:mt-0 sm:col-span-2">
              {{ $detailData->updated_at }}
            </dd>
          </div>
          <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Gambar Pertanyaan
            </dt>
            <dd class="mt-1 text-sm text-gray-900 md:text-base sm:mt-0 sm:col-span-2">
              <img class="object-cover p-2 border border-gray-200 rounded-md "
                src="{{ $detailData->img != 'no-img.png' ? asset('img/kuis') . '/' . $detailData->img : asset('img/no-img.png') }}"
                alt="">
            </dd>
          </div>

          <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Pertanyaan
            </dt>
            <div class="col-span-2">
              {!! $detailData->question !!}

            </div>
          </div>
          <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Opsi A
            </dt>
            <dd class="mt-1 text-sm text-gray-900 md:text-base sm:mt-0 sm:col-span-2">
              {!! $detailData->option_1 !!}
            </dd>
          </div>
          <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Opsi B
            </dt>
            <div class="col-span-2">
              {!! $detailData->option_2 !!}
            </div>
          </div>
          <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Opsi C
            </dt>
            <dd class="mt-1 text-sm text-gray-900 md:text-base sm:mt-0 sm:col-span-2">
              {!! $detailData->option_3 !!}
            </dd>
          </div>
          <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 md:text-base">
              Opsi D
            </dt>
            <div class="col-span-2">
              {!! $detailData->option_4 !!}
            </div>
          </div>
          <div class="px-4 py-5 bg-white f sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-bold text-gray-500 md:text-base">
              Opsi Benar
            </dt>
            <dd class="mt-1 text-sm font-bold text-gray-900 capitalize md:text-base sm:mt-0 sm:col-span-2">
              {!! $detailData->correct_option !!}
            </dd>
          </div>

        </dl>
      </div>
    </div>
  </div>
</x-admin-layout>
