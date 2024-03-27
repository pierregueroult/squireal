<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #fefede;
    color: #333;
    text-align: center;
    padding: 50px;
  }

  h1 {
    font-size: 36px;
    margin-bottom: 20px;
  }

  p {
    font-size: 18px;
    margin-bottom: 30px;
  }

  .mascotte-img {
    max-width: 300px;
    margin-top: 50px;
  }

  a {
    color: #297265;
    text-decoration: none;
    transition: color 0.3s;
    /* Animation de transition */
  }

  a:hover {
    color: #ffd882;
    /* Couleur du lien au survol */
  }
</style>

<body>
  <h1 class="font-title">Erreur 404 - L'écureil s'est perdu</h1>
  <p class="font-main">Désolé mais cette branche n'existe pas.</p>

  <img src="<?= base_url("/image/profil.png") ?>" alt="Mascotte" class="mascotte-img" />

  <p class="font-main">Retournez à <a href="<?= base_url() ?>">la page d'accueil</a>.</p>
</body>