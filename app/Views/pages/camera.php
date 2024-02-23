<main class="no-padding">
  <video id="camera" muted autoplay class="fixed inset-0 w-full h-full object-cover object-center z-0 -scale-x-100"></video>
  <script defer type="text/javascript">
    const camera = document.getElementById("camera");
    window.navigator.mediaDevices.getUserMedia({
      video: true
    }).then(stream => {
      camera.srcObject = stream;
      video.onloadedmetadata = (e) => {
        video.play();
      };
    });
  </script>
</main>