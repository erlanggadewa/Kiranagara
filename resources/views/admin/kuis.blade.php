<x-admin-layout>

  <div class="my-8">
    <h1 class="text-xl font-bold">Konten Kuis</h1>
  </div>

  <x-auth-validation-error title="Gagal Menambahkan Data"></x-auth-validation-error>

  <form action="{{ route('kuis-admin.store') }}" method="post" enctype="multipart/form">
    @csrf
    <input id="img-name-kuis" type="hidden" value="no-img.png" name="img">

    <div class="grid w-full gap-8 px-6 py-4 border rounded-md shadow-lg xl:grid-cols-4 bg-tertiary border-secondary">
      {{-- section left --}}
      <div class="xl:col-span-1">
        {{-- select level --}}

        <div>
          <label>
            <span class="inline-block mb-2 font-bold text-gray-600 select-none">Level</span>
            <select
              class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring focus:ring-primary"
              name="level" id="category">
              <option value="" selected="selected" hidden="hidden">Choose one</option>
              <option value="easy">Easy</option>
              <option value="medium">Medium</option>
              <option value="hard">Hard</option>
              <option value="expert">Expert</option>

            </select>
          </label>
        </div>
        <div class="mt-6">
          <h1 class="mb-2 font-bold text-gray-600 select-none">Thumbnail</h1>
          <label id="border-drop-area"
            class="relative z-50 flex flex-col w-full p-10 text-center bg-white border-4 rounded-lg cursor-pointer xl:aspect-square group">
            <div class="flex flex-col items-center justify-center w-full h-full text-center ">
              <svg class="w-20 fill-current text-secondary" xmlns="http://www.w3.org/2000/svg" version="1.1"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                viewBox="0 0 459.904 459.904" style="enable-background:new 0 0 512 512" xml:space="preserve"
                class="">
                <g>
                  <g xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <path
                        d="M123.465,168.28h46.543v138.07c0,14.008,11.358,25.352,25.352,25.352h69.2c13.993,0,25.352-11.343,25.352-25.352V168.28    h46.527c7.708,0,14.637-4.641,17.601-11.764c2.933-7.094,1.301-15.295-4.145-20.741L243.413,29.28    c-7.437-7.422-19.485-7.422-26.938,0L110.011,135.775c-5.447,5.446-7.079,13.633-4.13,20.741    C108.843,163.625,115.757,168.28,123.465,168.28z"
                        data-original="#000000" class=""></path>
                    </g>
                    <g>
                      <path
                        d="M437.036,220.029c-12.617,0-22.852,10.237-22.852,22.867v95.615c0,28.643-23.317,51.944-51.961,51.944H97.679    c-28.644,0-51.945-23.301-51.945-51.944v-95.615c0-12.63-10.251-22.867-22.867-22.867C10.236,220.029,0,230.266,0,242.897v95.615    c0,53.859,43.818,97.679,97.679,97.679h264.544c53.861,0,97.681-43.819,97.681-97.679v-95.615    C459.904,230.266,449.667,220.029,437.036,220.029z"
                        data-original="#000000" class=""></path>
                    </g>
                  </g>
                </g>
              </svg>
              <p id="info-upload" class="mt-4 text-sm font-bold text-gray-500 rounded-lg pointer-none">
                Upload foto di sini
              </p>
            </div>
            <div id="preview-container" class="absolute inset-0 flex items-center justify-center">
              <img id="preview-img-kuis" class="object-cover h-full">
            </div>
            <input id="img-kuis" name="img-file" type="file" accept="image/*" class="hidden">
          </label>
        </div>
      </div>

      {{-- section right --}}
      <div class="xl:col-span-3">
        {{-- input soal --}}
        <div class="mt-6 xl:mt-0">
          <div class="block h-full font-semibold text-gray-600 select-none ">
            <label for="question" class="inline-block mb-2 font-bold">Soal</label>
            <div class="w-full h-full">
              <input id="question" type="hidden" name="question" value="{{ old('question') }}">
              <trix-editor id="question" class="" input="question">
              </trix-editor>
            </div>
          </div>
        </div>
        <h1 class="mt-6 mb-3 font-bold xl:mt-7">Opsi</h1>
        {{-- answer set --}}
        <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 ">
          <div class="relative mt-3">
            <input name="option_1" value="{{ old('option_1') }}" placeholder="Opsi A"
              class="w-full py-3 pl-3 pr-10 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring focus:ring-primary" />
            <input name="correct_option"
              class="absolute -translate-y-1/2 appearance-none checked:bg-primary right-4 top-1/2" type="radio"
              value="a">
          </div>
          <div class="relative mt-3">
            <input name="option_2" value="{{ old('option_2') }}" placeholder="Opsi B"
              class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring focus:ring-primary" />
            <input name="correct_option"
              class="absolute -translate-y-1/2 appearance-none checked:bg-primary right-4 top-1/2" type="radio"
              value="b">
          </div>
          <div class="relative mt-3">
            <input name="option_3" value="{{ old('option_3') }}" placeholder="Opsi C"
              class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring focus:ring-primary" />
            <input name="correct_option"
              class="absolute -translate-y-1/2 appearance-none checked:bg-primary right-4 top-1/2" type="radio"
              value="c">
          </div>
          <div class="relative mt-3">
            <input name="option_4" value="{{ old('option_4') }}" placeholder="Opsi D"
              class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring focus:ring-primary" />
            <input name="correct_option"
              class="absolute -translate-y-1/2 appearance-none checked:bg-primary right-4 top-1/2" type="radio"
              value="d">
          </div>
        </div>
        <x-button class="mt-4 bg-green-800 xl:mt-11 hover:bg-green-900 hover:border-green-900" type="submit ">Submit
        </x-button>
      </div>
    </div>
  </form>
  <script>
    function alert(msg, status) {
      Swal.fire(
        `${status}`, `${msg}`,
        `${status}`
      )
    }

    $(document).ready(function() {

      $("#img-kuis").ijaboCropTool({
        preview: "#preview-img-kuis",
        setRatio: 1,
        allowedExtensions: ["jpg", "jpeg", "png"],
        buttonsText: ["CROP", "QUIT"],
        buttonsColor: ["#0E4542", "#e60033", -15],
        processUrl: '{{ route('crop-kuis') }}',
        withCSRF: ["_token", "{{ csrf_token() }}"],
        onSuccess: function(message, element, status, name) {
          alert(message, 'success');
          $('#img-name-kuis').val(name);
        },
        onError: function(message, element, status) {
          alert(message, 'error');
        },
      })
    });
  </script>
</x-admin-layout>
