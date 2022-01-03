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
      // disable event click after answer is clicked
      element.closest("form.form-answer").classList.add("pointer-events-none");

      let progress = document.getElementById("progress");
      const textProgress = document.getElementById("text-percent");

      progress.setAttribute("style", `width: ${(percentProgress += 10)}%`);
      textProgress.innerHTML = `${percentProgress}%`;

      const id = element.closest("form.form-answer").getAttribute("id");

      // check answer using ajax fetch
      fetch(`/quiz/answer/${id}/${element.value}`)
        .then((res) => res.json())
        .then((status) => {
          if (status) {
            benar++;
            hasil[i].innerHTML = printBenar();
          } else {
            salah++;
            hasil[i].innerHTML = printSalah();
          }
        })
        .catch((err) => console.log(err));
    });
  }, true);
});

function printBenar() {
  return '<div style="background-color: #e6fef8" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #018d40">Horee, jawabanmu benar 😎 Tetap pertahankan yaa 💯💯💯</h1></div>';
}

function printSalah() {
  return '<div style="background-color: #fff4dd" class="text-sm px-4 py-2 rounded-xl"><h1 style="color: #d97b41">Yaahh, jawabanmu salah 😥 Jangan putus asa ya 💥💖</h1></div>';
}
