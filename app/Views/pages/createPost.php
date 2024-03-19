<main class="no-padding overflow-scroll">
  <form class="w-full h-auto px-6 mt-2" method="POST" enctype="multipart/form-data" id="createPostForm"
    action="<?= base_url("/api/post/create") ?>">
    <h3 class="font-main pt-20 font-semibold text-xl underline">Create a new post :</h3>
    <div class="flex flex-col gap-2 w-full">
      <p class="font-main font-semibold text-sm pt-2">Enter your description here :</p>
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex overflow-hidden">
        <textarea class="h-32 p-2 w-full outline-none" name="description" id="description" required
          placeholder="Write your text over here"></textarea>
      </div>
      <p class="font-main font-semibold text-sm pt-2">And then upload your picture here :</p>
      <div class="w-full overflow-hidden items-center justify-center">
        <p class="h-auto w-full flex flex-col items-center justify-center border-2 border-text rounded-xl bg-foreground p-4"
          id="pictureText">
          <span id="pictureTextSpan">Upload a picture here</span>
          <img src="" alt="" id="picturePreview" class="rounded-lg" />
        </p>
        <input type="file" class="sr-only" name="picture" id="picture"
          accept="image/png, image/jpeg, image/jpg, image/gif, image/webp" required />
        <div class="w-full grid grid-cols-2 gap-2 font-main mt-2">
          <label class="border-maindarkgreen border-2 flex justify-center bg-foreground rounded-xl py-2 font-semibold"
            for="picture">
            Add picture
          </label>
          <button class="border-maindarkgreen border-2 flex justify-center bg-foreground rounded-xl py-2 font-semibold"
            id="pictureDelete" type="button">
            Remove picture
          </button>
        </div>
      </div>
      <p class="font-main font-semibold text-sm pt-2">Select the event you want to link to your post :</p>
      <input type="hidden" name="currentUrl" value="<?= current_url() ?>" />
      <input type="hidden" name="locale" value="<?= $locale ?>" />
      <select class="w-full border-2 border-text rounded-xl bg-foreground p-2" name="event" id="event" required>
        <option value="none">
          Ne lier à aucun événement
        </option>
        <?php foreach ($events as $event): ?>
          <option value="<?= $event["event_id"] ?>">
            <?= $event["name"] ?>
          </option>
        <?php endforeach; ?>
      </select>
      <button
        class="w-full border-2 border-maindarkgreen bg-maindarkgreen text-foreground rounded-xl p-2 font-semibold mt-4 mb-48"
        type="submit">
        Create the post
      </button>
    </div>
    <script>
      const pictureInput = document.getElementById('picture');
      const pictureText = document.getElementById('pictureText');
      const pictureTextSpan = document.getElementById('pictureTextSpan');
      const pictureLabel = document.getElementById('pictureLabel');
      const picturePreview = document.getElementById('picturePreview');
      const pictureDelete = document.getElementById('pictureDelete');

      pictureText.addEventListener('click', () => {
        pictureInput.click();
      });

      pictureInput.addEventListener('change', () => {
        const file = pictureInput.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = () => {
            picturePreview.src = reader.result;
          };
          reader.readAsDataURL(file);
          pictureTextSpan.classList.add('hidden');
        }
      });

      pictureDelete.addEventListener('click', () => {
        pictureInput.value = '';
        picturePreview.src = '';
        pictureTextSpan.classList.remove('hidden');
      });
    </script>
  </form>
</main>