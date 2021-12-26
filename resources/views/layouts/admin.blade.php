<x-app-layout>
  @include('layouts.header')

  <div class=" md:gap-2 lg:gap-6 md:flex">
    @include('layouts.navigation-admin')
    <!-- Page Content -->
    <main class="flex-grow px-4 md:mr-7 lg:mr-10 md:px-0">
      {{ $slot }}
    </main>
  </div>

  @include('layouts.footer')
</x-app-layout>
