<main class="no-padding">
    <p class="font-main px-4 pt-20 font-semibold">Posts recommandés :</p>
    <section class="px-4 py-2 space-y-4" id="content">

    </section>
    <div class="w-full flex items-center justify-center mb-32">
        <button class="bg-maindarkgreen text-foreground p-4 rounded-full" id="load-more-posts">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19M12 5V19" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <a href="<?= base_url() . service("request")->getLocale() ?>/app/post/create"
        class="fixed bottom-28 right-8 py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main text-sm">
        Créer un post
    </a>
    <script>
        const loadMoreButton = document.getElementById("load-more-posts");
        const content = document.getElementById("content");
        let offset = 0;
        let count = 3;

        async function loadPost() {
            const response = await fetch("<?= base_url() ?>api/post/all?count=" + count + "&offset=" + offset);
            const data = await response.text();
            content.innerHTML += data;
        }

        loadMoreButton.addEventListener("click", loadPost);
        loadPost();
    </script>
</main>