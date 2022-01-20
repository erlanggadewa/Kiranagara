<div class="relative">


  <div class="dropdown dropdown-end">
    <div tabindex="0" class="h-full bg-transparent border-0 btn btn-ghost rounded-btn">
      <div class="flex items-center justify-end gap-4 px-4 py-2 text-black cursor-pointer ">
        <div class="hidden text-right md:block justify-self-end ">
          <h1 class="font-bold">{{ Auth::user()->name }}</h1>
          <h2 class="text-sm uppercase">{{ Auth::user()->role }}</h2>
        </div>
        <img class="w-12 h-12 rounded-full"
          src="{{ Auth::user()->img != 'default-profile.jpg' ? asset('img/profile') . '/' . Auth::user()->img : asset('img/default-profile.jpg') }}"
          alt="">
      </div>


    </div>
    <ul style="z-index: 9999" tabindex="0" class="w-full p-2 shadow-lg menu dropdown-content bg-base-100 rounded-box ">
      <li>
        <a href="{{ route('profile') }}" class="flex items-center justify-center md:justify-start">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
          </svg>
          <h1 class="hidden ml-3 md:block">Account</h1>
        </a>
      </li>
      @if (Auth::user()->role == 'admin')
        <li>
          <a href="{{ route('dashboard-admin') }}" class="flex items-center justify-center md:justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path
                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <h1 class="hidden ml-3 md:block">Admin</h1>
          </a>
        </li>
        <li>
          <a href="{{ route('dashboard-user') }}" class="flex items-center justify-center md:justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path
                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
            </svg>
            <h1 class="hidden ml-3 md:block">Academy</h1>
          </a>
        </li>
      @endif
      <form class="block" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="block w-full">
          <li>
            <a class="flex items-center justify-center md:justify-start"><svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <h1 class="hidden ml-3 md:block">Logout</h1>
            </a>
          </li>
        </button>
      </form>
    </ul>
  </div>
</div>
