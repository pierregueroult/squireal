<?php

$color = $event["color"];

?>
<div class="fixed bg-background top-0 left-0 right-0 h-20 z-30">

</div>
<div
  class="fixed top-20 left-4 right-4 h-20 bg-maindarkgreen flex items-center justify-start text-white font-bold rounded-xl px-4 gap-4 z-50">
  <img src="<?= base_url("svg/$color.svg") ?>" class="h-12 w-12" />
  <div class="flex flex-col gap-1 text-background flex-1 overflow-hidden">
    <p class="font-semibold text-2xl leading-none text-background font-main">
      <?= $event["name"] ?>
    </p>
    <p class="text-md leading-none text-background font-main truncate">
      <?= $event["description"] ?>
    </p>
  </div>
</div>

<main class="absolute top-0 gap-2 h-screen overflow-y-scroll px-4 flex flex-col no-padding py-44">
</main>
<form class="fixed left-8 right-8 bottom-28 h-14 flex gap-2 items-center z-50" id="chat-form"
  onsubmit="handleSubmit(event); return false;">
  <input type="text" class="flex-1 h-full rounded-xl border-2 border-maindarkgreen bg-foreground text-black px-4"
    placeholder="<?= lang("Discussion.send") ?>" name="message" id="message" required autocomplete="off"
    autocorrect="on" autocapitalize="on" spellcheck="true" />
  <button type="submit" class="h-full w-auto bg-maindarkgreen text-white rounded-xl px-4">
    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M21 1L14 21L10 12M21 1L1 8L10 12M21 1L10 12" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" />
    </svg>
  </button>
</form>
<div class="h-44 fixed bottom-0 right-0 left-0 bg-background z-10">

</div>
<script>
  const scrollDown = () => {
    const main = document.querySelector("main");
    main.scrollTop = main.scrollHeight;
  }

  const updateChat = () => {
    fetch("<?= base_url() ?>/api/event/chat/get/<?= $event["event_id"] ?>")
      .then(response => response.text())
      .then(data => {
        const main = document.querySelector("main");
        main.innerHTML = data;
      });
  }

  const handleSubmit = (event) => {
    event.preventDefault();
    const message = document.querySelector("#message").value;
    fetch("<?= base_url() ?>/api/event/chat/post/<?= $event["event_id"] ?>", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        message,
      }),
    })
      .then(response => {
        document.querySelector("#message").value = "";
        updateChat()
        setTimeout(scrollDown, 300);
      })

  }

  updateChat();
  setTimeout(scrollDown, 300);
  setInterval(updateChat, 2000);
</script>