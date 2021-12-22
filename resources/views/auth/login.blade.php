<x-guest-layout>
  <div x-cloak x-data="{openLogin : false}" class="gap-3 md:flex ">
    <div :class="!openLogin ? 'block' : 'hidden'"
      class="relative flex-col justify-between px-5 py-10 overflow-x-hidden md:flex md:px-14 md:py-14 md:w-3/5 ">

      <div class="flex items-center gap-4 flex-nowrap ">
        <img src="{{ asset('img/logoKiranagara.png') }}" alt="logo" class="w-12">
        <img src="{{ asset('img/KIRANAGARA.png') }}" alt="kiranagara" class="h-6">
      </div>

      <div id="img-person" class="mt-14 ">
        <img class="lg:w-4/5 xl:w-3/4" src="{{ asset('img/personRegister.png') }}" alt="person">
      </div>

      <p class="font-medium text-center my-14 md:my-0 md:mt-10">
        Kiranagara merupakan sebuah platform belajar online gratis yang membahas mengenai kebudayaan yang ada di
        Indonesia.
        Kirana berasal dari bahasa sastra Indonesia yang berarti cantik dan Nagara berarti Negara.
      </p>
      <div class="md:hidden" x-on:click="openLogin = true">
        <x-button type="submit">
          NEXT
        </x-button>
      </div>

      <img src="{{ asset('img/pattern1.png') }}" alt="" class="absolute bottom-0 left-0 w-1/2 md:w-1/3"
        style="z-index: -999">
    </div>

    <x-tasks.login-form ::class="openLogin ? 'block' : 'hidden'"></x-tasks.login-form>


  </div>
</x-guest-layout>
