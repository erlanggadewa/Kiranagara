<x-app-layout>
  @include('layouts.header')

  <div class="flex p-5 md:gap-5">
    @if (!request()->routeIs('quiz-user'))
      @include('layouts.navigation-user')
    @endif
    <!-- Page Content -->
    <main class="overflow-auto basis-full">
      {{ $slot }}
    </main>
  </div>

  @include('layouts.footer')
</x-app-layout>
