const header_inactive_class = [
  "-translate-x-full",
  "sm:translate-x-full",
  "opacity-0",
  "pointer-events-none",
];
const header_mobile_navigation = document.querySelector("aside#mobile-navigation");
const header_mobile_button = document.querySelector("button#mobile-navigation-button");
const header_mobile_icons = document.querySelectorAll("button#mobile-navigation-button svg");

header_mobile_button.addEventListener("click", () => {
  if (header_mobile_navigation.classList.contains("-translate-x-full")) {
    header_mobile_navigation.classList.remove(...header_inactive_class);
  } else {
    header_mobile_navigation.classList.add(...header_inactive_class);
  }
  header_mobile_icons.forEach((icon) => {
    ["rotate-45", "opacity-0", "invisible"].map((c) => icon.classList.toggle(c));
  });
});

if ((navigator.standalone, window.matchMedia("(display-mode: standalone)").matches)) {
  const locale = window.location.pathname.split("/")[2];
  const app = `/squireal/${locale}/app/`;
  window.location = app;
}
