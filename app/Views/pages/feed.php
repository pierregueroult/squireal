<main class="no-padding">
    <p class="font-main px-4 pt-20 font-semibold">Posts recommandés :</p>
    <section class="px-4 py-2 space-y-4">
        <?php
        $postModel = new \App\Models\Post();
        $posts = $postModel->getLatest(10);

        foreach ($posts as $post) {
          echo view("components/app/post", ["post" => $post]);
        }
        ?>
    </section>
    <a href="<?= base_url() . service("request")->getLocale() ?>/app/post/create"
        class="fixed bottom-28 right-8 py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main text-sm">
        Créer un post
    </a>
</main>