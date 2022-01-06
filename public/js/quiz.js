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

      async function checkAnswer(id, value) {
        try {
          let res = await fetch(`/quiz/answer/${id}/${value}`);
          let status = await res.json();

          printHasil(status, i);

          if (benar + salah == 10) {
            console.log("benar = " + benar);
            console.log("salah = " + salah);
            console.log("wkwk");
          }
        } catch (error) {
          return console.log(error);
        }
      }

      checkAnswer(id, element.value);
    });
  }, true);
});

function printBenar() {
  return '<div style="background-color: #e6fef8" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #018d40">Horee, jawabanmu benar 😎 Tetap pertahankan yaa 💯💯💯</h1></div>';
}

function printSalah() {
  return '<div style="background-color: #fff4dd" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #d97b41">Yaahh, jawabanmu salah 😥 Jangan putus asa ya 💥💖</h1></div>';
}

function printHasil(status, indexElement) {
  if (status) {
    benar++;
    hasil[indexElement].innerHTML = printBenar();
  } else {
    salah++;
    hasil[indexElement].innerHTML = printSalah();
  }
}
