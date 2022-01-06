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
    <ul tabindex="0" class="w-full p-2 shadow menu dropdown-content bg-base-100 rounded-box">
      <li>
        <a href="{{ Auth::user()->role == 'admin' ? route('profile-admin') : route('profile-user') }}"
          class="flex items-center justify-center md:justify-start">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
          </svg>
          <h1 class="hidden ml-3 md:block">Pengaturan</h1>
        </a>
      </li>
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
  {{-- <div class="absolute py-4 artboard artboard-demo bg-base-200">
    <ul class="py-3 shadow-lg menu bg-base-100 rounded-box">
      <li class="menu-title">
        <span>
          Menu Title
        </span>
      </li>
      <li>
        <a>
          Item without icon
        </a>
      </li>
      <li>
        <a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="inline-block w-5 h-5 mr-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
            </path>
          </svg>
          Item with icon

        </a>
      </li>
      <li>
        <a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="inline-block w-5 h-5 mr-2 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
          </svg>
          Item with icon

          <div class="ml-2 badge success">3</div>
        </a>
      </li>
    </ul>
  </div> --}}

</div>
