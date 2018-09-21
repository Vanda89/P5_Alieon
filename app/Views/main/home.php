<?php $this->layout('layout', ['title' => 'Accueil']); ?>
<main class="row d-flex flex-column mt-2 mb-5">
  <div id="welcomeMessage" class="container d-flex justify-content-center align-self-center mt-5 mb-3">
    <h2 id="welcome-title" class="text-center font-weight-bold mb-5">
      <?= $welcome; ?>
    </h2>
  </div>

  <section id="carouselGames" class="carousel slide container mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselGames-row" data-slide-to="0" class="active"></li>
      <li data-target="#carouselGames-row" data-slide-to="1"></li>
    </ol>

    <div class="carousel-inner d-flex justify-content-center mb-5">
      <div class="carousel-item row active ">
        <img src="../public/images/slides/Screenshot_Memory_mobile.jpg" class="mobile-screenshot d-sm-none" alt="Screenshot du jeu Memory pour petite résolution">
        <img src="../public/images/slides/Screenshot_Memory.jpg" class="full-screenshot d-xs-none d-sm-block" alt="Screenshot du jeu Memory pour grande résolution">
      </div>

      <div class="carousel-item row">
        <img src="../public/images/slides/Screenshot_Tape-lettre_mobile.jpg" class="mobile-screenshot d-sm-none" alt="Screenshot du jeu Tape-lettre pour petite résolution">
        <img src="../public/images/slides/Screenshot_Tape-lettre.jpg" class="full-screenshot d-xs-none d-sm-block" alt="Screenshot du jeu Tape-lettre pour grande résolution">

        <a class="carousel-control-prev" href="#carouselGames-row" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselGames-row" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>


  <section id="news-container" class="container">
    <div id="news-row" class="row d-flex flex-column justify-content-between align-items-center mt-5">
      <h3 id="news-container-title" class="title-category mb-5">Actualités</h3>
      <?php foreach ($newsList as $index => $news) : ?>
      <article id="news" class="d-flex flex-column p-4 mb-5">
        <h6 id="news-date" class="align-self-end mb-4">
          <?= $news['date']; ?>
        </h6>
        <h4 id="news-title" class="align-self-center text-center mb-4">
          <?= $news['title']; ?>
        </h4>
        <p id="news-content" class="text-justify mb-2">
          <?= $news['content']; ?>
        </p>
      </article>
      <?php endforeach; ?>

      <?php if ($nbSlide > 1) : ?>
      <div class="d-flex justify-content-center my-4">
        <nav class="posts-list-pagination" aria-label="Page navigation example">
          <ul class="pagination">
            <?php for ($i = 1; $i <= $nbSlide; ++$i) : ?>
            <li class="page-item">
              <a class="page-link" href="/?news=<?= $i; ?>">
                <?= $i; ?>
              </a>
            </li>
            <?php endfor; ?>
          </ul>
        </nav>
      </div>
      <?php endif; ?>
    </div>
  </section>
</main>