const camera = document.getElementById("camera");
const button = document.getElementById("capture");
const imageContainer = document.getElementById("photo");
const image = imageContainer.querySelector("img");
const close = imageContainer.querySelector("button#close");
const validate = imageContainer.querySelector("button#validate");
const input = document.getElementById("photo-input");

window.navigator.mediaDevices
  .getUserMedia({
    video: true,
  })
  .then((stream) => {
    camera.srcObject = stream;
    try {
      video.onloadedmetadata = (e) => {
        video.play();
      };
    } catch (e) {}
  });

button.addEventListener("click", async () => {
  const canvas = document.createElement("canvas");
  canvas.width = camera.videoWidth;
  canvas.height = camera.videoHeight;
  const ctx = canvas.getContext("2d");
  ctx.drawImage(camera, 0, 0, canvas.width, canvas.height);
  const data = canvas.toDataURL("image/png");
  image.src = data;
  input.value = data;
  imageContainer.classList.remove("hidden");
});

close.addEventListener("click", () => {
  imageContainer.classList.add("hidden");
});

validate.addEventListener("click", () => {
  input.value = data;
});
