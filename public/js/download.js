let installPrompt = null;
let installButton = document.getElementById("install-button");

window.addEventListener("beforeinstallprompt", (e) => {
  e.preventDefault();

  installPrompt = e;
  installButton.classList.toggle("flex", true);
  installButton.classList.toggle("hidden", false);
});

installButton.addEventListener("click", async () => {
  if (!installPrompt) {
    return;
  }
  const result = await installPrompt.prompt();
  console.log(result);
});
