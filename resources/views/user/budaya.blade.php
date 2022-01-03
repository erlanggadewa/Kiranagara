<x-user-layout>
  <div class="grid w-full grid-cols-2 px-8 mt-6 gap-7 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
    @if (count($culturalData))
      @foreach ($culturalData as $item)
        <div x-data="{'open' : false}" class="cursor-pointer ">
          <div @click="open = !open"
            class="flex flex-col items-center h-full p-5 duration-100 transform hover:scale-105 hover:shadow-xl hover:shadow-secondary hover:ring-4 hover:ring-secondary rounded-2xl justify-evenly"
            style="background-color: #c4c4c44d">
            <img
              src="{{ $item->img != 'no-img.png' ? asset('img/budaya/data/' . $item->img) : asset('img/' . $item->img) }}"
              alt="" class="object-cover rounded-md aspect-square" />
            <h1 class="mt-4 text-base font-bold text-center md:text-base">{{ $item->name }}</h1>

          </div>

          <!-- detail -->
          <div x-show="open">
            <div class="fixed inset-0 z-50 flex items-center justify-center cursor-default "
              style="background-color: rgba(128, 128, 128, 0.541)">
              <div
                class="grid w-4/5 grid-cols-1 p-5 duration-300 bg-white lg:grid-rows-none gap-7 lg:gap-10 lg:grid-cols-5 lg:p-10 h-4/5 hover:transform hover:scale-105 hover:ring-4 hover:shadow-2xl rounded-3xl "
                @click.outside="open = !open">
                <div class="self-center justify-self-center items-center max-w-[230px] lg:max-w-none lg:col-span-2">
                  <img
                    src="{{ $item->img != 'no-img.png' ? asset('img/budaya/data/' . $item->img) : asset('img/' . $item->img) }}"
                    alt="" class="object-cover rounded-md aspect-square" />
                </div>
                <div class="h-full overflow-auto lg:col-span-3">
                  <h1 class="mb-2 text-2xl font-semibold text-center text-green-800 md:text-3xl">
                    {{ $item->name }}
                  </h1>
                  <div class="block h-full mt-4 text-sm text-justify break-words lg:text-base px-7 ">
                    {!! $item->description !!}

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <div x-data="{ open: true }" x-show="open" class=" fixed inset-0 z-[9999999999] overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
          <div
            class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div
                  class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                  <!-- Heroicon name: outline/exclamation -->
                  <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                    Data Kosong
                  </h3>
                  <div class="mt-2">
                    <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                      Hubungi admin untuk mengisi data!!
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
              <a href="{{ url()->previous() }}">
                <button type="button"
                  class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                  Close
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    @endif

  </div>
</x-user-layout>
