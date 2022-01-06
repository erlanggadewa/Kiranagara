<x-admin-layout>
  <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form">
    @csrf
    @method('PUT')

    <x-auth-validation-error title="Gagal mengubah data!"></x-auth-validation-error>

    <div class="grid w-full grid-cols-1 px-4 mt-8 border shadow-md border-secondary rounded-xl bg-tertiary">
      <input id="img-name-profile" type="hidden" name="img" value="{{ Auth::user()->img }}">
      <label for="img-profile" class=" justify-self-center">
        <img id="preview-img-profile"
          src="{{ Auth::user()->img != 'default-profile.jpg' ? asset('img/profile') . '/' . Auth::user()->img : asset('img/default-profile.jpg') }}"
          alt="gambar profil"
          class="object-cover w-full  max-w-[280px] mb-4 duration-300 rounded-full mt-9 drop-shadow-lg ring-primary hover:scale-105 ring aspect-square">
        <input id="img-profile" name="img-file" type="file" accept="image/*" class="hidden">
      </label>
      <div class=" gap-x-4 md:mx-10 lg:mx-20 xl:mx-32 md:grid md:grid-cols-2">
        {{-- input full name --}}
        <div class="col-span-2 mb-4">
          <x-input-icon-update value="{{ Auth::user()->name }}" name="name" placeholder="Full Name" label="Full Name">
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

        <x-button type="submit" class="col-span-2 mt-10 mb-8 md:mt-4 ">Submit</x-button>
      </div>
    </div>
  </form>

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
