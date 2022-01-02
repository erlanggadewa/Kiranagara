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

{{-- @dd($quizzes) --}}
<x-app-layout>
  @include("layouts.header")
  <div class="flex justify-center">
    <div class=" w-1/2 h-10 flex justify-center items-center rounded-b-xl flex-col bg-green-500">
      <h1 class="text-white font-medium capitalize">Level {{ $level }}</h1>
    </div>
  </div>
  <div class="w-full gap-0 px-9 grid justify-center">

    <div
      class="flex flex-col justify-center flex-grow-0 max-w-4xl gap-6 p-6 mt-10 duration-300 rounded-lg soal sm:items-center md:flex-row sm:hover:transform sm:hover:scale-105 md:p-10 hover:ring-4 hover:shadow-2xl ring-green-500"
      style="background-color: #ececec">
      <div class="flex items-center self-center justify-center w-full h-full p-4 rounded-lg shadow-lg md:max-w-sm"
        style="background-color: white">
        <img src="{{ asset('img/kuis/UIMG2021122661c86db32da68.jpg') }}" alt="Soal" class="" />
      </div>
      <!-- soal dan jawaban -->
      <div class="w-full h-full p-5 mt-6 bg-white rounded-md sm:mt-0">
        <h1 class="mb-4 font-medium">Nama Jakarta pada abad ke 14 adalah ?</h1>
        <form action="">
          <!-- opsi 1 -->
          <label
            class="flex items-center p-2 mb-1 mr-4 duration-100 cursor-pointer answer rounded-xl hover:bg-main-green"
            for="radio1" value="A">
            <input id="radio1" type="radio" name="radio" class="hidden" />
            <div class="flex items-center">
              <span class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
              Sunda Kelapa
            </div>
          </label>

          <!-- opsi 2 -->
          <label
            class="flex items-center p-2 mb-1 mr-4 duration-100 cursor-pointer answer rounded-xl hover:bg-main-green"
            for="radio2" value="B">
            <input id="radio2" type="radio" name="radio" class="hidden" />
            <div class="flex items-center">
              <span class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
              Jayakarta
            </div>
          </label>

          <!-- opsi 3 -->
          <label
            class="flex items-center p-2 mb-1 mr-4 duration-100 cursor-pointer answer rounded-xl hover:bg-main-green"
            for="radio3" value="C">
            <input id="radio3" type="radio" name="radio" class="hidden" />
            <div class="flex items-center">
              <span class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
              Djakarta
            </div>
          </label>

          <!-- opsi 4 -->
          <label
            class="flex items-center p-2 mb-1 mr-4 duration-100 cursor-pointer answer rounded-xl hover:bg-main-green"
            for="radio4" value="D">
            <input id="radio4" type="radio" name="radio" class="hidden" />
            <div class="flex items-center">
              <span class="inline-block w-6 h-6 mr-2 border-2 border-blue-400 rounded-full flex-no-shrink"></span>
              Batavia
            </div>
          </label>
        </form>
        <!-- Hasil -->
        <div class="mt-4 hasil"></div>
      </div>
    </div>
  </div>



</x-app-layout>
<script>
  const listAnswers = ["A", "C", "B", "C", "B"];

  let benar = 0;
  let salah = 0;
  let counter = 0;

  const hasil = document.querySelectorAll("div.hasil");
  const questions = document.querySelectorAll("div.soal");

  questions.forEach((element, i) => {
    const userAnswers = element.querySelectorAll("label.answer");

    userAnswers.forEach((element, j) => {
      element.addEventListener("click", () => {
        addProgress();
        if (element.getAttribute("value") === listAnswers[i]) {
          benar++;
          hasil[i].innerHTML = printBenar();
        } else {
          salah++;
          hasil[i].innerHTML = printSalah();
        }
        for (let index = 0; index < 4; index++)
          userAnswers[index].classList.add("pointer-events-none");

      });
    });
  });

  function printBenar() {
    return '<div style="background-color: #e6fef8" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #018d40">Horee, jawabanmu benar 😎 Tetap pertahankan yaa 💯💯💯</h1></div>';
  }

  function printSalah() {
    return '<div style="background-color: #fff4dd" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #d97b41">Yaahh, jawabanmu salah 😥 Jangan putus asa ya 💥💖</h1></div>';
  }

  let percentProgress = 0;

  function addProgress() {
    const progress = document.querySelectorAll(".progress");
    progress[0].innerHTML = `${(percentProgress += 10)}%`;
    progress[1].setAttribute("style", `width:${percentProgress}%`);
  }
</script>
