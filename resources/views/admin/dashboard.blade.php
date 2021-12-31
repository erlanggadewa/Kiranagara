<x-admin-layout>
  <div class="">
    <div class="my-8">
      <h1 class="text-xl font-bold">Selamat Datang Admin</h1>
      <h2 class="">your daily stats</h2>
    </div>

    <div class="grid grid-cols-2 gap-3 md:gap-6 md:grid-cols-4">
      <div class="resume-dashboard ">
        <div class="w-5 h-5 bg-red-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Kategori Budaya</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ $totalCulturalCategory . ' Kategori' }}</h2>
        </div>
      </div>
      <div class="resume-dashboard ">
        <div class="w-5 h-5 bg-yellow-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Konten Daerah</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ $totalRegion . ' Konten' }}</h2>
        </div>
      </div>
      <div class="resume-dashboard">
        <div class="w-5 h-5 bg-green-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Soal Kuis</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ $totalQuiz . ' Soal' }}</h2>
        </div>
      </div>

      <div class="resume-dashboard">
        <div class="w-5 h-5 bg-blue-400 rounded-full lg:w-7 lg:h-7 blur-sm"></div>
        <div>
          <h1 class="text-xs lg:text-base">Konten Budaya</h1>
          <h2 class="text-sm font-bold lg:text-base">{{ $totalCulturalData . ' Konten' }}</h2>
        </div>
      </div>

    </div>

    <div class="grid justify-center p-5 mt-10 rounded-md shadow-md bg-tertiary">
      <h1 class="mt-5 mb-10 text-xl font-bold text-center">Diagram Konten</h1>
      <div class="max-w-sm">
        <canvas id="diagram-konten" class="w-full cursor-pointer "></canvas>
      </div>
    </div>

    <div id="culturalData">
      <x-show-culture></x-show-culture>

    </div>
    <x-management-daerah></x-management-daerah>
    <x-management-kuis></x-management-kuis>




  </div>
</x-admin-layout>
<script>
  $(window).scroll(function() {
    sessionStorage.scrollTop = $(this).scrollTop();
  });

  $(document).ready(function() {
    if (sessionStorage.scrollTop != "undefined") {
      $(window).scrollTop(sessionStorage.scrollTop);
    }
  });
  // $(document).ready(function() {
  //   $(document).on('click', '.pagination a', function(event) {
  //     event.preventDefault();
  //     if ($(this).attr('href').includes('culture')) {
  //       let page = $(this).attr('href').split('culture=')[1];
  //       getMoreCulture(page)
  //     } else {
  //       page = $(this).attr('href').split('region=')[1];
  //     }
  //   })
  // })

  // function getMoreCulture(page) {
  //   $.ajax({
  //     type: "GET",
  // url: "route('get-more-culture') " + "?page=" + page,
  //     success: function(data) {
  //       console.log(page)
  //       $('#culturalData').html(data)
  //     }
  //   })

  // }

  const diagramKonten = new Chart(
    document.getElementById("diagram-konten").getContext("2d"), {
      type: "doughnut",
      data: {
        labels: [
          "Soal Kuis",
          "Kategori Budaya",
          "Konten Budaya",
          "Konten Daerah",
        ],
        datasets: [{
          label: "Diagram Konten",
          data: [
            {{ $totalQuiz }},
            {{ $totalCulturalCategory }},
            {{ $totalCulturalData }},
            {{ $totalRegion }}
          ],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        }, ],
        options: {},
      },
    }
  );
</script>
