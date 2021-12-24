<x-admin-layout>
  <div class="my-8">
    <h1 class="text-xl font-bold">Konten Budaya</h1>
  </div>

  <div class="">
    <div class="px-6 py-4 border rounded-lg shadow-lg bg-tertiary border-secondary">
      <form method="POST" enctype="multipart/form-data" action="{{ route('budaya.store') }}">
        @csrf
        <div>
          <x-input-basic placeholder="Enter Judul Kategori" label="Judul Kategori" name="name"></x-input-basic>
        </div>
        <div class="mt-4">
          <label for="mb-2 font-semibold text-gray-600 select-none">Thumbnail</label>
          <div class="relative w-full mt-2">
            <div id="drop-area" class="relative flex items-center justify-center w-full">
              <label id="border-drop-area"
                class="relative z-50 flex flex-col w-full h-56 p-10 text-center border-4 border-dashed rounded-lg cursor-pointer group">
                <div class="flex flex-col items-center justify-center w-full h-full text-center ">
                  <div id="preview-container" class="absolute block ">
                    <img id="preview-img" class="h-56 p-3">
                  </div>

                  <p id="info-upload"
                    class="absolute inset-0 z-50 flex items-center justify-center text-base font-bold rounded-lg pointer-none">
                    Drag
                    and drop
                    files here
                    <br>
                    or select a file from your computer
                  </p>
                </div>
                <input id="input-img" name="img" type="file" accept="image/*" class="hidden"
                  onchange="uploadHandler(event)">
              </label>
            </div>
          </div>
        </div>
        {{-- <input type="file" name="img" id="img"> --}}
        <x-button type="submit" class="mt-6">Submit</x-button>
      </form>
    </div>
  </div>
  <script src="{{ asset('js/uploadImg.js') }}"></script>
  <script>
    $(document).ready(function () {

      $("#input-img").ijaboCropTool({
        preview: ".image-previewer",
        setRatio: 1,
        allowedExtensions: ["jpg", "jpeg", "png"],
        buttonsText: ["CROP", "QUIT"],
        buttonsColor: ["#30bf7d", "#ee5155", -15],
        processUrl: '{{ route("crop") }}',
        withCSRF: ["_token", "{{ csrf_token() }}"],
        onSuccess: function (message, element, status) {
          alert(message);
        },
        onError: function (message, element, status) {
          alert(message);
        },
      });
    });
  </script>
</x-admin-layout>
