<x-admin-layout>

  <div x-cloak x-data="{ open: false }">
    <div x-cloak x-show="!open">
      <div
        class="flex flex-col items-center justify-center w-full gap-6 py-10 mt-6 sm:px-10 lg:px-20 shrink-0 md:justify-start grow-0 sm:gap-12 md:gap-16 sm:flex-row bg-secondary rounded-3xl">
        <img
          src="{{ Auth::user()->img != 'default-profile.jpg' ? asset('img/profile') . '/' . Auth::user()->img : asset('img/default-profile.jpg') }}"
          alt="profil-image" class="w-32 h-32 rounded-full lg:w-44 lg:h-44 ring ring-primary aspect-square">
        <div class="grow">
          <h1
            class="mb-6 text-xl font-bold text-center underline sm:text-left lg:text-3xl text-primary decoration-green-700/50 decoration-4">
            {{ Auth::user()->name }}</h1>
          <div class="flex items-center justify-center gap-2 sm:justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 fill-current ionicon"
              viewBox="0 0 512 512">
              <title>Mail</title>
              <path
                d="M424 80H88a56.06 56.06 0 00-56 56v240a56.06 56.06 0 0056 56h336a56.06 56.06 0 0056-56V136a56.06 56.06 0 00-56-56zm-14.18 92.63l-144 112a16 16 0 01-19.64 0l-144-112a16 16 0 1119.64-25.26L256 251.73l134.18-104.36a16 16 0 0119.64 25.26z" />
            </svg>
            <h1 class="text-sm md:text-base">{{ Auth::user()->email }}</h1>
          </div>
          <div class="flex items-center justify-center gap-2 mt-3 sm:justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 fill-current ionicon"
              viewBox="0 0 512 512">
              <title>Person Circle</title>
              <path
                d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48zm-50.22 116.82C218.45 151.39 236.28 144 256 144s37.39 7.44 50.11 20.94c12.89 13.68 19.16 32.06 17.68 51.82C320.83 256 290.43 288 256 288s-64.89-32-67.79-71.25c-1.47-19.92 4.79-38.36 17.57-51.93zM256 432a175.49 175.49 0 01-126-53.22 122.91 122.91 0 0135.14-33.44C190.63 329 222.89 320 256 320s65.37 9 90.83 25.34A122.87 122.87 0 01382 378.78 175.45 175.45 0 01256 432z" />
            </svg>
            <h1 class="text-sm md:text-base">{{ Auth::user()->name }}</h1>
          </div>
        </div>
        <button x-on:click="open = ! open"
          class="relative flex items-center justify-center gap-1 btn-md bg-primary btn ">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-current ionicon" viewBox="0 0 512 512">
            <title>Create</title>
            <path d="M384 224v184a40 40 0 01-40 40H104a40 40 0 01-40-40V168a40 40 0 0140-40h167.48" fill="none"
              stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            <path
              d="M459.94 53.25a16.06 16.06 0 00-23.22-.56L424.35 65a8 8 0 000 11.31l11.34 11.32a8 8 0 0011.34 0l12.06-12c6.1-6.09 6.67-16.01.85-22.38zM399.34 90L218.82 270.2a9 9 0 00-2.31 3.93L208.16 299a3.91 3.91 0 004.86 4.86l24.85-8.35a9 9 0 003.93-2.31L422 112.66a9 9 0 000-12.66l-9.95-10a9 9 0 00-12.71 0z" />
          </svg>
          <h1 class="mt-1 text-sm md:text-base">Edit</h1>
        </button>
      </div>

      <div class="max-w-sm m-auto my-10 lg:hidden">
        <canvas id="diagram-doughnut" class="cursor-pointer "></canvas>
      </div>
      <div class="hidden m-auto my-10 lg:max-w-3xl xl:max-w-5xl lg:block">
        <canvas id="diagram-bar" class="cursor-pointer "></canvas>
      </div>
    </div>

    {{-- detail profil --}}
    <form x-cloak x-show="open" action="{{ route('update-profile') }}" method="post" enctype="multipart/form">
      @csrf
      @method('PUT')

      <x-auth-validation-error title="Gagal mengubah data!"></x-auth-validation-error>

      <div class="relative grid w-full grid-cols-1 px-4 mt-8 border shadow-md border-secondary rounded-xl bg-tertiary">
        <svg x-on:click="open = ! open" xmlns="http://www.w3.org/2000/svg"
          class="absolute w-10 h-10 cursor-pointer top-5 left-5 ionicon" viewBox="0 0 512 512">
          <title>Arrow Back Circle</title>
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
            d="M249.38 336L170 256l79.38-80M181.03 256H342" />
          <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none"
            stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
        </svg>
        <input id="img-name-profile" type="hidden" name="img" value="{{ Auth::user()->img }}">
        <label for="img-profile" class="mt-20 justify-self-center">
          <img id="preview-img-profile"
            src="{{ Auth::user()->img != 'default-profile.jpg' ? asset('img/profile') . '/' . Auth::user()->img : asset('img/default-profile.jpg') }}"
            alt="gambar profil"
            class="object-cover w-full   max-w-[280px] mb-4 duration-300 rounded-full drop-shadow-lg ring-primary hover:scale-105 ring aspect-square">
          <input id="img-profile" name="img-file" type="file" accept="image/*" class="hidden">
        </label>
        <div class=" gap-x-4 md:mx-10 lg:mx-20 xl:mx-44 md:grid md:grid-cols-2">
          {{-- input full name --}}
          <div class="col-span-2 mb-4">
            <x-input-icon-update value="{{ Auth::user()->name }}" name="name" placeholder="Full Name"
              label="Full Name">
              @slot('path')
                <svg
                  class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 fill-current text-gray-500 peer-placeholder-shown:text-gray-300 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                  xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 48 48"
                  style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                  <g>
                    <g xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="m44.333 10.339h-19.343v4.266c0 .547-.443.99-.99.99s-.989-.443-.989-.99v-4.266h-19.344c-2.022 0-3.667 1.644-3.667 3.666v25.634c0 2.022 1.645 3.667 3.667 3.667h40.666c2.022 0 3.667-1.645 3.667-3.667v-25.634c0-2.022-1.645-3.666-3.667-3.666zm-30.182 5.77c2.345 0 4.253 1.909 4.253 4.255 0 2.344-1.908 4.25-4.253 4.25s-4.253-1.906-4.253-4.25c0-2.345 1.909-4.255 4.253-4.255zm9.602 21.266h-19.204c-.136 0-.247-.11-.247-.247 0-5.431 4.419-9.849 9.85-9.849s9.848 4.418 9.848 9.849c0 .137-.111.247-.247.247zm16.888-6.229h-12.469c-.547 0-.989-.443-.989-.99s.442-.989.989-.989h12.469c.547 0 .989.442.989.989s-.442.99-.989.99zm0-7.725h-12.469c-.547 0-.989-.442-.989-.99 0-.547.442-.989.989-.989h12.469c.547 0 .989.442.989.989 0 .548-.442.99-.989.99z">
                      </path>
                      <path d="m24.99 5.684c0-.547-.443-.989-.99-.989s-.989.442-.989.989v4.655h1.979z"></path>
                    </g>
                  </g>
                </svg>
              @endslot
            </x-input-icon-update>
          </div>

          {{-- input password --}}
          <div class="mb-4">
            <x-input-icon-update value="{{ Auth::user()->getAuthPassword() }}" name="password" placeholder="Password"
              label="Password" type="password" autocomplete="new-password">
              @slot('path')
                <svg
                  class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 fill-current text-gray-500 peer-placeholder-shown:text-gray-300 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                  xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24"
                  style="enable-background:new 0 0 512 512" xml:space="preserve">
                  <g>
                    <path xmlns="http://www.w3.org/2000/svg"
                      d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z">
                    </path>
                  </g>
                </svg>
              @endslot
            </x-input-icon-update>
          </div>

          {{-- confirm password --}}
          <div class="mb-4">
            <x-input-icon-update value="{{ Auth::user()->getAuthPassword() }}" name="password_confirmation"
              placeholder="Confirm Password" label="Confirm Password" type="password">
              @slot('path')
                <svg
                  class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 fill-current text-gray-500 peer-placeholder-shown:text-gray-300 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                  xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24"
                  style="enable-background:new 0 0 512 512" xml:space="preserve">
                  <g>
                    <path xmlns="http://www.w3.org/2000/svg"
                      d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z">
                    </path>
                  </g>
                </svg>
              @endslot
            </x-input-icon-update>
          </div>

          <x-button type="reset" class="col-span-1 mt-6 bg-red-800 hover:bg-red-900 hover:border-red-900 md:mt-4">
            Reset</x-button>
          <x-button type="submit" class="col-span-1 mt-3 mb-6 md:mt-4">Update</x-button>
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
    $("#img-profile").ijaboCropTool({
      preview: "#preview-img-profile",
      setRatio: 1,
      allowedExtensions: ["jpg", "jpeg", "png"],
      buttonsText: ["CROP", "QUIT"],
      buttonsColor: ["#0E4542", "#e60033", -15],
      processUrl: '{{ route('crop-profile') }}',
      withCSRF: ["_token", "{{ csrf_token() }}"],
      onSuccess: function(message, element, status, name) {
        alert(message, 'success');
        $('#img-name-profile').val(name);
      },
      onError: function(message, element, status) {
        alert(message, 'error');
      },
    })
  });
</script>
<script>
  const data = {
    labels: ["Average Easy", "Average Medium", "Average Hard", "Average Expert",
      "Highest Easy", "Highest Medium", "Highest Hard",
      "Highest Expert"
    ],
    datasets: [{
      axis: 'y',
      label: 'Record Quiz',
      data: [
        {{ $avgEasy }},
        {{ $avgMedium }},
        {{ $avgHard }},
        {{ $avgExpert }},
        {{ $highestEasy }},
        {{ $highestMedium }},
        {{ $highestHard }},
        {{ $highestExpert }},
      ],
      fill: false,
      backgroundColor: [
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(29, 93, 93, 0.2)',
        'rgba(13, 89, 140, 0.2)',
        'rgba(153, 76, 0, 0.2)',
        'rgba(163, 0, 35, 0.2)',
      ],
      borderColor: [
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(255, 159, 64)',
        'rgb(255, 99, 132)',
        'rgb(29, 93, 93)',
        'rgb(13, 89, 140)',
        'rgb(153, 76, 0)',
        'rgb(163, 0, 35)',
      ],
      borderWidth: 1
    }]
  };

  const diagramBar = new Chart(
    document.getElementById("diagram-bar").getContext("2d"), {
      type: "bar",
      data: data,
    }
  );

  const diagramDoughnut = new Chart(
    document.getElementById("diagram-doughnut").getContext("2d"), {
      type: "doughnut",
      data: data,
    }
  );
</script>
