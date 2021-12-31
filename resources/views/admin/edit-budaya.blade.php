<x-admin-layout>
  <div class="my-8">
    <h1 class="text-xl font-bold">Konten Budaya</h1>
  </div>

  <x-auth-validation-error title="Gagal Mengedit Data"></x-auth-validation-error>


  {{-- Data Budaya --}}
  <div class="px-6 py-4 border rounded-lg shadow-lg bg-tertiary border-secondary">
    <form method="POST" action="{{ route('data-budaya.update', $selectedData) }}">
      @csrf
      @method("PUT")

      <input type="hidden" value="{{ $selectedData->id }}" name="id">
      <input id="img-name-budaya" type="hidden" value="{{ $selectedData->img }}" name="img">

      <div class="grid gap-5 md:grid-cols-5 lg:grid-cols-10">
        <div class="md:col-span-2 lg:col-span-3">
          <div>
            {{-- input judul --}}
            <x-input-basic-update value="{{ $selectedData->name }}" placeholder="Enter Judul Kategori"
              label="Judul Data Budaya" name="name"></x-input-basic-update>


            {{-- pilih kategori --}}
            <div class="mt-6">
              <label class="">
                <span class="inline-block mb-2 font-semibold text-gray-600 select-none">Kategori</span>
                <select
                  class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring focus:ring-primary"
                  name="cultural_category_id" id="category">
                  <option value="{{ $selectedData->culturalCategory->id }}" name="cultural_category_id" selected>
                    {{ $selectedData->culturalCategory->name }}</option>

                  @foreach ($culturalCategories as $culturalCategory)
                    @continue($culturalCategory->name == $selectedData->culturalCategory->name)
                    <option value="{{ $culturalCategory->id }}">{{ $culturalCategory->name }}</option>
                  @endforeach

                </select>
              </label>
            </div>
          </div>

          {{-- input gambar --}}
          <div class="mt-6">
            <h1 class="mb-2 font-semibold text-gray-600 select-none">Thumbnail</h1>
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
                <img id="preview-img-budaya" class="object-cover h-full"
                  src="{{ $selectedData->img != 'no-img.png' ? asset('img/budaya/data') . '/' . $selectedData->img : asset('img/no-img.png') }}">
              </div>
              <input id="img-data-budaya" name="img-file" type="file" accept="image/*" class="hidden">
            </label>
          </div>


        </div>

        {{-- input deskripsi --}}
        <div class="mt-6 md:col-span-3 lg:col-span-7 md:mt-0">
          <div class="block h-full pb-16 font-semibold text-gray-600 select-none">
            <label for="description" class="inline-block mb-2">Deskripsi</label>
            <div class="w-full h-full">
              <input id="description" type="hidden" name="description" value="{{ $selectedData->description }}">
              <trix-editor id="description" class="h-full" input="description"></trix-editor>
            </div>
          </div>
        </div>
        <div class="flex gap-6 col-span-full">
          <button
            class="flex items-center justify-center w-full h-12 mt-6 font-semibold text-center text-white duration-200 bg-red-600 border-2 rounded-lg cursor-pointer hover:bg-red-700 hover:text-white hover:border-red-700"
            type="reset">
            Reset
          </button>
          <x-button type="submit" class="mt-6 ">Edit</x-button>
        </div>
      </div>

    </form>
  </div>
</x-admin-layout>

<script>
  function alert(msg, status) {
    Swal.fire(
      `${status}`, `${msg}`,
      `${status}`
    )
  }

  $(document).ready(function() {

    $("#img-kategori-budaya").ijaboCropTool({
      preview: "#preview-img-kategori",
      setRatio: 3 / 2,
      allowedExtensions: ["jpg", "jpeg", "png"],
      buttonsText: ["CROP", "QUIT"],
      buttonsColor: ["#0E4542", "#e60033", -15],
      processUrl: '{{ route('crop-kategori-budaya') }}',
      withCSRF: ["_token", "{{ csrf_token() }}"],
      onSuccess: function(message, element, status, name) {
        alert(message, 'success');
        $('#img-name-kategori').val(name);
      },
      onError: function(message, element, status) {
        alert(message, 'error');
      },
    })

    $("#img-data-budaya").ijaboCropTool({
      preview: "#preview-img-budaya",
      setRatio: 1,
      allowedExtensions: ["jpg", "jpeg", "png"],
      buttonsText: ["CROP", "QUIT"],
      buttonsColor: ["#0E4542", "#e60033", -15],
      processUrl: '{{ route('crop-data-budaya') }}',
      withCSRF: ["_token", "{{ csrf_token() }}"],
      onSuccess: function(message, element, status, name) {
        alert(message, 'success');
        $('#img-name-budaya').val(name);
      },
      onError: function(message, element, status) {
        alert(message, 'error');
      },
    })
  });
</script>
