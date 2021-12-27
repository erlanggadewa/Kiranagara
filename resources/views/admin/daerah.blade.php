<x-admin-layout>
  <div class="my-8">
    <h1 class="text-xl font-bold">Konten Daerah</h1>
  </div>

  <x-auth-validation-error title="Gagal Menambahkan Data"></x-auth-validation-error>

  <form action="{{ route('daerah-admin.store') }}" method="post" enctype="multipart/form">
    @csrf
    <div class="px-6 py-4 border rounded-lg shadow-lg bg-tertiary border-secondary">
      <div class="gap-8 lg:flex">
        <div class="basis-1/2">
          <div class="mt-0">
            <x-input-basic label="Nama Daerah" name="name" placeholder="Nama Daerah"></x-input-basic>
          </div>
          {{-- latitude, longitude --}}
          <div class="gap-5 lg:flex">
            <div class="mt-6 basis-1/2">
              <x-input-basic label="Latitude" name="latitude" placeholder="Ex : -0.789275 "></x-input-basic>
            </div>
            <div class="mt-6 basis-1/2">
              <x-input-basic label="Longitude" name="longitude" placeholder="Ex : 113.921326"></x-input-basic>
            </div>
          </div>
          {{-- region, population --}}
          <div class="gap-5 lg:flex">
            <div class="mt-6 basis-1/2">
              <x-input-basic label="Ukuran Daerah (Km²)" name="size_area" placeholder="Luas wilayah" type="number"
                min="0">
              </x-input-basic>
            </div>
            <div class="mt-6 basis-1/2">
              <x-input-basic label="Jumlah Penduduk (Juta)" name="population" placeholder="Jumlah penduduk"
                type="number" min="0">
              </x-input-basic>
            </div>
          </div>

          <div class="block h-full mt-6 font-semibold text-gray-600 select-none ">
            <label for="description" class="inline-block mb-2">Deskripsi</label>
            <div class="w-full">
              <input id="description" type="hidden" name="description" value="{{ old('description') }}">
              <trix-editor id="description" input="description" class="w-full"></trix-editor>
            </div>
          </div>
        </div>

        {{-- img --}}
        <div class="mt-6 lg:mt-0 grow">
          <div>
            <h1 class="mb-2 font-semibold text-gray-600 select-none">Thumbnail</h1>
            <label id="border-drop-area"
              class="relative z-50 flex flex-col w-full p-10 text-center bg-white border-4 rounded-lg cursor-pointer xl:aspect-video group">
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
                <img id="preview-img-daerah" class="h-full">
              </div>
              <input id="img-name-daerah" type="hidden" value="no-img.png" name="img">
              <input id="img-daerah" name="img-file" type="file" accept="image/*" class="hidden">
            </label>
          </div>
          <x-button type="submit" class="mt-7">Submit</x-button>
        </div>
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

      $("#img-daerah").ijaboCropTool({
        preview: "#preview-img-daerah",
        setRatio: 16 / 9,
        allowedExtensions: ["jpg", "jpeg", "png"],
        buttonsText: ["CROP", "QUIT"],
        buttonsColor: ["#0E4542", "#e60033", -15],
        processUrl: '{{ route('crop-daerah') }}',
        withCSRF: ["_token", "{{ csrf_token() }}"],
        onSuccess: function(message, element, status, name) {
          alert(message, 'success');
          $('#img-name-daerah').val(name);
        },
        onError: function(message, element, status) {
          alert(message, 'error');
        },
      })
    });
  </script>
</x-admin-layout>
