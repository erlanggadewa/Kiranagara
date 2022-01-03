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
  <div class="flex justify-center">
    <div class=" w-1/2 h-10 flex justify-center shadow-md items-center rounded-b-xl flex-col bg-green-500">
      <h1 class="text-white text-lg font-semibold  capitalize">Level {{ $level }}</h1>
    </div>
  </div>

  <div class="w-full gap-0 px-9 pb-28 grid justify-center">
    @php
      $no = 1;
      $radio = 1;
    @endphp
    @foreach ($quizzes as $item)

      <div
        class="select-none relative flex flex-col justify-center flex-grow-0 max-w-4xl gap-6 p-6 mt-14 duration-300 rounded-lg soal sm:items-center md:flex-row md:hover:transform md:hover:scale-105 md:p-10 hover:ring-4 hover:shadow-2xl ring-green-500"
        style="background-color: #ececec">
        {{-- nomor --}}
        <div
          class="shadow-md shadow-secondary ring-2 ring-green-400 w-12 justify-center items-center text-white flex align-middle h-12 bg-gray-700 absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 rounded-3xl">
          <h1 class=" block w-full text-center font-semibold text-lg">{{ $no++ }}</h1>
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
          <form id="{{ $radio }}" class="form-answer">
            <!-- opsi 1 -->
            <label class="label-answer" for="radio{{ $radio }}" value="A">
              <input id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 aspect-square mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
                <h1 class="">
                  {{ $item->option_1 }}
                </h1>
              </div>
            </label>

            <!-- opsi 2 -->
            <label class="label-answer" for="radio{{ $radio }}" value="B">
              <input id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 aspect-square mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
                {{ $item->option_2 }}
              </div>
            </label>

            <!-- opsi 3 -->
            <label class="label-answer" for="radio{{ $radio }}" value="C">
              <input id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
              <div class="flex items-center">
                <span
                  class="inline-block w-6 h-6 aspect-square mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
                {{ $item->option_3 }}
              </div>
            </label>

            <!-- opsi 4 -->
            <label class="label-answer" for="radio{{ $radio }}" value="D">
              <input id="radio{{ $radio++ }}" type="radio" name="radio" class="hidden answer" />
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
          <span
            class="inline-block px-2 py-1 text-xs font-semibold text-green-600 uppercase bg-green-200 rounded-full shadow-md ">
            Progress Quiz
          </span>
        </div>
        <div class="">
          <span
            class="p-3 w-12 h-8 shadow-md flex items-center justify-center bg-green-200 rounded-xl  text-base font-bold text-green-600 ">
            <h1 id="text-percent" class="">
              0%
            </h1>
          </span>
        </div>
      </div>
      <div class="shadow-md flex h-2 mb-4 overflow-hidden text-xs bg-green-200 rounded">
        <div id="progress"
          class="flex flex-col justify-center text-center text-white bg-green-500 shadow-none  whitespace-nowrap">
        </div>

      </div>
    </div>

  </div>



</x-app-layout>
<script>
  let data = [];
  @foreach ($quizzes as $quiz)
    data.push({question: '{{ $quiz->question }}', answer: '{{ $quiz->correct_option }}'});
  @endforeach


  let benar = 0;
  let salah = 0;
  let counter = 0;

  const hasil = document.querySelectorAll("div.hasil");

  let percentProgress = 0;

  const questions = document.querySelectorAll("div.soal");
  questions.forEach((element, i) => {
    const labelAnswers = document.querySelectorAll("label.label-answer")
    const userAnswers = element.querySelectorAll("input.answer");
    userAnswers.forEach((element) => {
      element.addEventListener("click", (e) => {
        element.closest("form.form-answer").classList.add("pointer-events-none");

        let progress = document.getElementById("progress");
        const textProgress = document.getElementById("text-percent");
        progress.setAttribute("style", `width: ${percentProgress+=10}%`);
        textProgress.innerHTML = `${percentProgress}%`;

        const id = element.closest("form.form-answer").getAttribute("id");
        console.log(labelAnswers)
        console.log(userAnswers[0].value)
        console.log(userAnswers[1].value)
        console.log(userAnswers[2].value)
        console.log(userAnswers[3].value)
        let status = fetch(`/quiz/answer/${id}/${userAnswers.value}`)
          .then((res) => console.log(res)).then(res => console.log(res))
          .catch((err) => console.log(err));

        if (status) {
          benar++;
          hasil[i].innerHTML = printBenar();
        } else {
          salah++;
          hasil[i].innerHTML = printSalah();
        }


      });
    }, true);
  });

  function printBenar() {
    return '<div style="background-color: #e6fef8" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #018d40">Horee, jawabanmu benar 😎 Tetap pertahankan yaa 💯💯💯</h1></div>';
  }

  function printSalah() {
    return '<div style="background-color: #fff4dd" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #d97b41">Yaahh, jawabanmu salah 😥 Jangan putus asa ya 💥💖</h1></div>';
  }
</script>
