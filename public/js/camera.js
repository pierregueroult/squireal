const camera = document.getElementById("camera");
const button = document.getElementById("capture");
const imageContainer = document.getElementById("photo");
const image = imageContainer.querySelector("img");
const close = imageContainer.querySelector("button#close");
const validate = imageContainer.querySelector("button#validate");
const input = document.getElementById("photo-input");
const change = document.getElementById("switch");

navigator.mediaDevices.enumerateDevices().then((devices) => {
  devices = devices.filter((device) => device.kind === "videoinput");

  if (devices.length > 1) change.classList.remove("hidden");
  if (devices.length === 0) return;

  const defaultDevice = devices[0].deviceId;
  const constraints = {
    video: {
      deviceId: defaultDevice,
    },
  };

  navigator.mediaDevices
    .getUserMedia(constraints)
    .then((stream) => {
      camera.srcObject = stream;
    })
    .catch((error) => {
      console.error(error);
    });

  change.addEventListener("click", () => {
    const currentDevice = devices.findIndex(
      (device) => device.deviceId === constraints.video.deviceId,
    );
    const nextDevice = devices[(currentDevice + 1) % devices.length].deviceId;
    constraints.video.deviceId = nextDevice;
    navigator.mediaDevices
      .getUserMedia(constraints)
      .then((stream) => {
        camera.srcObject = stream;
      })
      .catch((error) => {
        console.error(error);
      });
  });
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
