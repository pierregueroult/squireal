<footer
  class="bg-maindarkgreen text-text w-near-full max-w-screen-2xl mx-auto rounded-t-xl border-text border-2 border-b-0 shadow-pop overflow-hidden">
  <div class="flex items-center w-full justify-between p-6 bg-mainlightgreen rounded-b-xl relative">
    <h4 class="font-title text-mainorange text-4xl lg:text-5xl">
      SquiReal
    </h4>
    <ul
      class="flex items-center h-full space-x-4 lg:absolute lg:top-1/2 lg:left-1/2 lg:-translate-x-1/2 lg:-translate-y-1/2">
      <li>
        <a href="https://youtube.com/squireal" target="_blank" rel="noopener noreferrer"
          title="<?= lang("Footer.youtube_alt") ?>">
          <img src="<?= base_url() ?>image/yt.png" alt="<?php lang(
              "Footer.youtube_image_alt"
            ); ?>" class="w-10 h-10" />
        </a>
      </li>
      <li>
        <a href="https://twitter.com/squireal" target="_blank" rel="noopener noreferrer"
          title="<?= lang("Footer.twitter_alt") ?>">
          <img src="<?= base_url() ?>image/X_logo.png" alt="<?= lang("Footer.twitter_image_alt") ?>"
            class="w-10 h-10" />
        </a>
      </li>
      <li>
        <a href="https://instagram.com/squireal" target="_blank" rel="noopener noreferrer"
          title="<?= lang("Footer.instagram_alt") ?>">
          <img src="<?= base_url() ?>image/instagram.png" alt="<?= lang(
              "Footer.instagram_image_alt"
            ) ?>" class="w-10 h-10" />
        </a>
      </li>
    </ul>
    <form class="hidden lg:flex items-center space-x-4" id="newsletter-form">
      <label for="newsletter" class="sr-only">
        <?= lang("Footer.newsletter_title") ?>
      </label>
      <input type="email" placeholder="<?= lang(
        "Footer.newsletter_placeholder"
      ) ?>" id="newsletter" name="newsletter"
        class="bg-foreground border-foreground px-4 py-2 rounded-lg focus:outline-none focus:border-maindarkgreen font-main border-2 text-text"
        required title="<?= lang("Footer.newsletter_title") ?>" />
      <button type="submit"
        class="bg-maindarkgreen text-foreground px-6 py-2 rounded-lg hover:bg-mainorange focus:outline-none focus:bg-maindarkgreen font-main transition-colors cursor-pointer">
        <?= lang("Footer.newsletter_button") ?>
      </button>
    </form>
    <script defer>
      const form = document.getElementById('newsletter-form');
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const data = new FormData(form);
        const res = await fetch('<?= base_url() ?>api/subscribe', {
          method: 'POST',
          body: JSON.stringify({ email: data.get('newsletter') }),
        });
        const code = res.status;
        if (code === 200) {
          const { message } = await res.json();
          alert(message);
        } else {
          const { error } = await res.json();
          alert(error);
        }
      }); 
    </script>
  </div>
  <div class="flex items-center justify-center w-full py-4 rounded-t-xl">
    <p class="text-sm font-semibold font-main text-foreground sm:text-md">
      <?= lang("Footer.copyright") ?>
    </p>
  </div>
</footer>