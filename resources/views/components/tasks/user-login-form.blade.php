<div>
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <input type="hidden" value="user" name="role">
    {{-- input email --}}
    <div class="mb-4">
      <x-input-icon id="email" required :value="old('email')" type="email" name="email" placeholder="Email"
        label="Email">
        @slot('path')
          <svg
            class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 fill-current text-gray-500 peer-placeholder-shown:text-gray-300 h-6 w-6"
            xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
            xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512"
            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
            <g>
              <path xmlns="http://www.w3.org/2000/svg"
                d="m298.789 313.693c-12.738 8.492-27.534 12.981-42.789 12.981-15.254 0-30.05-4.489-42.788-12.981l-209.803-139.873c-1.164-.776-2.298-1.585-3.409-2.417v229.197c0 26.278 21.325 47.133 47.133 47.133h417.733c26.278 0 47.133-21.325 47.133-47.133v-229.198c-1.113.834-2.249 1.645-3.416 2.422z">
              </path>
              <path xmlns="http://www.w3.org/2000/svg"
                d="m20.05 148.858 209.803 139.874c7.942 5.295 17.044 7.942 26.146 7.942 9.103 0 18.206-2.648 26.148-7.942l209.803-139.874c12.555-8.365 20.05-22.365 20.05-37.475 0-25.981-21.137-47.117-47.117-47.117h-417.766c-25.98.001-47.117 21.137-47.117 47.142 0 15.085 7.496 29.085 20.05 37.45z">
              </path>
            </g>
          </svg>
        @endslot
      </x-input-icon>
    </div>

    {{-- input password --}}
    <div class="mb-4">
      <x-input-icon id="password" required :value="old('password')" name="password" placeholder="Password"
        label="Password" type="password">
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
      </x-input-icon>
    </div>

    <x-checkbox class="mt-1" name="remember">
      Remember me
    </x-checkbox>

    <div class="mt-8">
      <x-button type="submit" class="bg-green-800 hover:bg-green-900 hover:border-green-900">
        LOGIN
      </x-button>
    </div>

  </form>
</div>
