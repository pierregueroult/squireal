<main class="no-padding">
    <p class="font-main px-4 pt-20 font-semibold">Posts recommandés :</p>
    <section
        class="p-4"
    >
        <?php
        $postModel = new \App\Models\Post();
        $posts = $postModel->getLatest(10);

        foreach ($posts as $post) {
          echo view("components/app/post", ["post" => $post]);
        }
        ?>
    </section>
</main>