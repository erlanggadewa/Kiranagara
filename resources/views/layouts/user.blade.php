<x-app-layout>
  @include('layouts.header')

  <div class="flex gap-10 p-5">
    @include('layouts.navigation-user')
    <!-- Page Content -->
    <main class="overflow-auto basis-full">
      {{ $slot }}
    </main>
  </div>

  @include('layouts.footer')
</x-app-layout>
