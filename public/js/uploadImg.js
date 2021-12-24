const textUpload = document.getElementById("info-upload");
const preview = document.getElementById("preview-img");
const inputImg = document.getElementById("input-img");

function showPreview(file) {
  const validType = ["image/jpeg", "image/jpg", "image/png"];

  if (validType.includes(file.type)) {
    const src = URL.createObjectURL(file);
    preview.src = src;
    preview.style.display = "block";

    textUpload.innerHTML = "";
  }
}

function uploadHandler(event) {
  if (event.target.files.length > 0) {
    const file = event.target.files[0];
    showPreview(file);
  }
}

const dropArea = document.getElementById("drop-area");
const border = document.getElementById("border-drop-area");

dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  border.classList.add("border-gray-300");
  textUpload.innerHTML = "Release to Upload File";
  textUpload.style.backgroundColor = "rgba(128, 128, 128, 0.75)";
});

dropArea.addEventListener("dragleave", (event) => {
  event.preventDefault();
  border.classList.remove("border-gray-300");
  textUpload.innerHTML = inputImg.files[0]
    ? ""
    : `Drag and drop files here <br> or select a file from your computer`;
  textUpload.style.backgroundColor = "";
});

dropArea.addEventListener("drop", (event) => {
  event.preventDefault();
  textUpload.innerHTML = ``;
  textUpload.style.backgroundColor = "";

  const dt = new DataTransfer();
  dt.items.add(event.dataTransfer.files[0]);

  inputImg.files = dt.files;
  showPreview(inputImg.files[0]);
});
