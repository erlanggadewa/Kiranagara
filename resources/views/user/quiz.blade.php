<style>
  input[type="radio"]+div span {
    transition: background 0.2s, transform 0.2s;
  }

  input[type="radio"]+div span:hover,
  input[type="radio"]+div:hover span {
    transform: scale(1.2);
  }

  input[type="radio"]:checked+div span {
    background-color: #3490dc;
    /* box-shadow: 0px 0px 0px 2px white inset; */
  }

  input[type="radio"]:checked+div {
    color: #3490dc;
  }

</style>

<x-app-layout>
  @include("layouts.header")
  @php
    $isEasy = $level == 'easy' ? true : false;
    $isMedium = $level == 'medium' ? true : false;
    $isHard = $level == 'hard' ? true : false;
    $isExpert = $level == 'expert' ? true : false;
  @endphp

  <div class="flex justify-center">
    <div @class([
        'w-1/2',
        'h-10',
        'flex',
        'justify-center',
        'shadow-md',
        'items-center',
        'rounded-b-xl',
        'flex-col',
        'bg-green-500' => $isEasy,
        'bg-sky-500' => $isMedium,
        'bg-orange-500' => $isHard,
        'bg-red-500' => $isExpert,
    ])>
      <h1 class="text-white text-lg font-semibold  capitalize">Level {{ $level }}</h1>
    </div>
  </div>

  <div class="w-full gap-0 px-2 md:px-9 pb-28 grid justify-center">
    @php
      $no = 1;
      $radio = 1;
    @endphp
    @foreach ($quizzes as $item)

      <div @class([
          'wrapper-quiz',
          'soal',
          'ring-green-500' => $isEasy,
          'ring-sky-500' => $isMedium,
          'ring-orange-500' => $isHard,
          'ring-red-500' => $isExpert,
      ]) style="background-color: #ececec">
        {{-- nomor --}}
        <div @class([
            'number-quiz',
            'ring-green-400' => $isEasy,
            'ring-sky-400' => $isMedium,
            'ring-orange-400' => $isHard,
            'ring-red-400' => $isExpert,
        ])>
          <h1 class=" block w-full text-center font-semibold text-2xl">{{ $no++ }}</h1>
        </div>

        {{-- gambar soal --}}
        <div
          class="ring-slate-200 ring flex items-center self-center justify-center w-full h-full p-4 rounded-lg shadow-lg md:max-w-sm"
          style="background-color: white">
          <img src="{{ $item->img == 'no-img.png' ? asset('img/no-img.png') : asset('img/kuis') . '/' . $item->img }}"
            alt="Soal" class="" />
        </div>

        <!-- soal dan jawaban -->
        <div class="w-full h-full p-5 mt-6 bg-white rounded-md sm:mt-0">
          <h1 class="bg-tertiary font-semibold border ring border-secondary p-4 rounded-md mb-4  text-justify">
            {{ $item->question }}
          </h1>
          <form id="{{ $item->id }}" class="form-answer">
            <!-- opsi 1 -->
            <label class="label-answer" for="radio{{ $radio }}">
              <input value="A" id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 aspect-square mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
                <h1 class="">
                  {{ $item->option_1 }}
                </h1>
              </div>
            </label>

            <!-- opsi 2 -->
            <label class="label-answer" for="radio{{ $radio }}">
              <input value="B" id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 aspect-square mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
                {{ $item->option_2 }}
              </div>
            </label>

            <!-- opsi 3 -->
            <label class="label-answer" for="radio{{ $radio }}">
              <input value="C" id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 aspect-square mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
                {{ $item->option_3 }}
              </div>
            </label>

            <!-- opsi 4 -->
            <label class="label-answer" for="radio{{ $radio }}">
              <input value="D" id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 aspect-square mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
                {{ $item->option_4 }}
              </div>
            </label>
          </form>
          <!-- Hasil -->
          <div class="mt-4 hasil"></div>
        </div>
      </div>

    @endforeach


    <div class="fixed inset-x-0 bottom-0 px-5">
      <div class="flex items-center justify-between mb-2">
        <div>
          <span @class([
              'progress-title',
              'text-green-600 bg-green-200' => $isEasy,
              'text-sky-600 bg-sky-200' => $isMedium,
              'text-orange-600 bg-orange-200' => $isHard,
              'text-red-600 bg-red-200' => $isExpert,
          ])>
            Progress Quiz
          </span>
        </div>
        <div>
          <span @class([
              'text-percent',
              'text-green-600  bg-green-200' => $isEasy,
              'text-sky-600 bg-sky-200' => $isMedium,
              'text-orange-600 bg-orange-200' => $isHard,
              'text-red-600 bg-red-200' => $isExpert,
          ])>
            <h1 id="text-percent">
              0%
            </h1>
          </span>
        </div>
      </div>
      <div @class([
          'progress-inactive',
          'bg-green-200' => $isEasy,
          'bg-sky-200' => $isMedium,
          'bg-orange-200' => $isHard,
          'bg-red-200' => $isExpert,
      ])>
        <div id="progress" @class([
            'progress-active',
            'bg-green-500' => $isEasy,
            'bg-sky-500' => $isMedium,
            'bg-orange-500' => $isHard,
            'bg-red-500' => $isExpert,
        ])>
        </div>

      </div>
    </div>

  </div>

  <div id="mark-wrapper" style="display: " class="flex justify-center items-center fixed inset-0 glassmorphism">
    <div class="relative bg-white rounded-xl w-4/5 h-4/5 flex justify-center items-center">
      <div class="w-20 h-20 bg-slate-300 top-0 absolute rounded-bl-md rounded-tr-xl right-0">x</div>
      <img src="{{ asset('img/100.png') }}" alt="mark" class="sm:max-w-lg">
    </div>
  </div>
</x-app-layout>
<script src="{{ asset('js/quiz.js') }}"></script>
