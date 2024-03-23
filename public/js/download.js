let installPrompt = null;
let installButton = document.getElementsByClassName("install-button");

window.addEventListener("beforeinstallprompt", (e) => {
  e.preventDefault();
  installPrompt = e;
  for (let i = 0; i < installButton.length; i++) {
    installButton[i].classList.toggle("hidden");
    installButton[i].classList.toggle("flex");

    installButton[i].addEventListener("click", async () => {
      if (!installPrompt) {
        return;
      }
      await installPrompt.prompt();
    });
  }
});
