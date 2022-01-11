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
      <h1 class="text-lg font-semibold text-white capitalize pointer-events-none">Level {{ $level }}</h1>
    </div>
  </div>

  <div class="grid justify-center w-full gap-0 px-2 md:px-9 pb-28">
    @php
      $no = 1;
      $radio = 1;
    @endphp
    @foreach ($quizzes as $item)

      <div @class([
          'wrapper-quiz',
          'soal',
          // 'ring-green-500' => $isEasy,
          // 'ring-sky-500' => $isMedium,
          // 'ring-orange-500' => $isHard,
          // 'ring-red-500' => $isExpert,
      ]) style="background-color: #ececec">
        {{-- nomor --}}
        <div @class([
            'number-quiz',
            'ring-green-400' => $isEasy,
            'ring-sky-400' => $isMedium,
            'ring-orange-400' => $isHard,
            'ring-red-400' => $isExpert,
        ])>
          <h1 class="block w-full text-2xl font-semibold text-center ">{{ $no++ }}</h1>
        </div>

        {{-- gambar soal --}}
        <div
          class="flex items-center self-center justify-center w-full h-full p-4 rounded-lg shadow-lg ring-slate-200 ring md:max-w-sm"
          style="background-color: white">
          <img src="{{ $item->img == 'no-img.png' ? asset('img/no-img.png') : asset('img/kuis') . '/' . $item->img }}"
            alt="Soal" class="" />
        </div>

        <!-- soal dan jawaban -->
        <div class="w-full h-full p-5 mt-6 bg-white rounded-md sm:mt-0">
          <div class="p-4 mb-4 font-semibold text-justify border rounded-md bg-tertiary ring border-secondary">
            {!! $item->question !!}
          </div>
          <form id="{{ $item->id }}" class="form-answer">
            <!-- opsi 1 -->
            <label class="label-answer" for="radio{{ $radio }}">
              <input value="A" id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full aspect-square flex-no-shrink"></span>
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
                  class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full aspect-square flex-no-shrink"></span>
                {{ $item->option_2 }}
              </div>
            </label>

            <!-- opsi 3 -->
            <label class="label-answer" for="radio{{ $radio }}">
              <input value="C" id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full aspect-square flex-no-shrink"></span>
                {{ $item->option_3 }}
              </div>
            </label>

            <!-- opsi 4 -->
            <label class="label-answer" for="radio{{ $radio }}">
              <input value="D" id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full aspect-square flex-no-shrink"></span>
                {{ $item->option_4 }}
              </div>
            </label>
          </form>
          <!-- Hasil -->
          <div class="mt-4 hasil"></div>
        </div>
      </div>

    @endforeach


    <div class="fixed inset-x-0 bottom-0 px-6 py-3 rounded-t-3xl ">
      <div class="flex items-center justify-between mb-2">
        {{-- progress title --}}
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
        {{-- number percent --}}
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
          'ring',
          'ring-green-600' => $isEasy,
          'ring-sky-600' => $isMedium,
          'ring-orange-600' => $isHard,
          'ring-red-600' => $isExpert,
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

  <div id="mark-wrapper" style="display: none" class="fixed inset-0 flex items-center justify-center glassmorphism">
    <div class="relative flex items-center justify-center w-4/5 bg-white rounded-xl h-4/5">

      <a href="{{ route('dashboard-user') }}">
        <button class="absolute top-5 right-5 btn btn-circle btn-sm sm:btn-md">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="inline-block w-6 h-6 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </a>
      <img id="mark-img" alt="mark" class="sm:max-w-lg">
    </div>
  </div>
</x-app-layout>
<script>
  let benar = 0;
  let salah = 0;
  let counter = 0;
  let percentProgress = 0;

  const hasil = document.querySelectorAll("div.hasil");
  const questions = document.querySelectorAll("div.soal");

  questions.forEach((element, i) => {
    const userAnswers = element.querySelectorAll("input.answer");
    userAnswers.forEach((element) => {
      element.addEventListener("click", (e) => {
        let progress = document.getElementById("progress");
        const textProgress = document.getElementById("text-percent");

        progress.setAttribute("style", `width: ${(percentProgress += 10)}%`);
        textProgress.innerHTML = `${percentProgress}%`;

        const form = element.closest("form.form-answer");
        const id = form.getAttribute("id");

        // disable event click after answer is clicked
        element.closest("div.wrapper-quiz").classList.add("pointer-events-none");

        // check answer using ajax fetch
        checkAnswer(id, element.value, i);



      });
    }, true);
  });

  async function checkAnswer(id, value, i) {
    try {
      let res = await fetch(`/quiz/answer/${id}/${value}`);
      let status = await res.json();

      printHasil(status, i);

      if (benar + salah == 100) {
        $.ajax({
          type: "post",
          url: "{{ route('store-quiz') }}",
          data: {
            level: "{{ $level }}",
            score: benar,
            _token: "{{ csrf_token() }}"
          },
          dataType: "json",
          success: function(response) {
            // console.log(response);
          },
          error: function(error) {
            console.log(error);
          }
        });

        const markWrapper = document.getElementById("mark-wrapper");
        markWrapper.style.display = "flex";
        const imgWrapper = document.getElementById('mark-img');
        imgWrapper.src = `{{ asset('img/${benar}.png') }}`;
      }

    } catch (error) {
      return console.log(error);
    }
  }

  function printBenar() {
    return '<div style="background-color: #e6fef8" class="px-4 py-2 text-sm rounded-xl"><h1 style="color: #018d40">Horee, jawabanmu benar 😎 Tetap pertahankan yaa 💯💯💯</h1></div>';
  }

  function printSalah() {
    return '<div style="background-color: #fff4dd" class="px-4 py-2 text-sm rounded-xl"><h1 style="color: #d97b41">Yaahh, jawabanmu salah 😥 Jangan putus asa ya 💥💖</h1></div>';
  }

  function printHasil(status, indexElement) {
    if (status) {
      benar += 10;
      hasil[indexElement].innerHTML = printBenar();
    } else {
      salah += 10;
      hasil[indexElement].innerHTML = printSalah();
    }
  }
</script>
