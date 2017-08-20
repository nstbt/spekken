<header>
  <nav>
    <div class="nav">
      <ul>
        <li><a href="index.php"><img src="./assets/img/logo.png" alt="spekken logo" width="482" height="45"></a></li>
        <li><a class="nav-item" href="index.php?page=agenda">Agenda</a></li>
        <li><a class="nav-item" href="#">Praktisch</a></li>
        <li><a class="nav-item" href="#">Nieuws</a></li>
      </ul>
      <input type="text" class="nav-search" placeholder="Zoeken...">
    </div>
  </nav>
  <div class="header-image">
    <h1 class="header-title">Spekken</h1>
    <p class="hidden">Het meest kakelbonte kinderfestival</p>
  </div>

</header>

<main>
  <section class="info nobanner">
    <h2 class="hidden">Over</h2>
    <article class="over-tagline">
      <h2 class="hidden">Spekken</h2>
      <p>Spekken stelt de culturele theaterwereld open voor peuters, kleuters en kinderen van 2 tot 12 jaar.</p>
    </article>
    <article class="over-tinnenpot">
      <h2>Tinnenpot</h2>
      <p>Een multifunctioneel centrum waar alle vormen en genres van theater, zang, dans en muziek een geschikte plaats vinden.</p>
      <a href="#">Meer over de Tinnenpot</a>
    </article>
  </section>

  <section class="agenda-section">
    <h2 class="agenda-title"><span class="hidden">Een greep uit het aanbod</span></h2>
    <div class="agenda-items">
      <a class="agenda-detail-link" href="index.php?page=detail&amp;id=<?php echo $event1["id"]; ?>">
        <article class="agenda-item">
          <?php $date = date_parse($event1['start']);?>
          <p class="agenda-item-date"><?php echo $date['day'] . '/' . $date['month']; ?></p>
          <h2 class="agenda-item-title"><?php echo $event1["title"]; ?></h2>
          <p class="agenda-item-info"><?php echo $event1['start_age']; ?> tot <?php echo $event1['end_age']; ?> jaar</p>
          <img class="agenda-item-img" src="./assets/img/events/small/<?php echo $event1['image'] ?>.png" alt="<?php echo $event1["title"]; ?>" width="316" heigth="316">
        </article>
      </a>
      <a class="agenda-detail-link" href="index.php?page=detail&amp;id=<?php echo $event2["id"]; ?>">
        <article class="agenda-item">
          <?php $date = date_parse($event2['start']);?>
          <p class="agenda-item-date"><?php echo $date['day'] . '/' . $date['month']; ?></p>
          <h2 class="agenda-item-title"><?php echo $event2["title"]; ?></h2>
          <p class="agenda-item-info"><?php echo $event2['start_age']; ?> tot <?php echo $event2['end_age']; ?> jaar</p>
          <img class="agenda-item-img" src="./assets/img/events/small/<?php echo $event2['image'] ?>.png" alt="<?php echo $event2["title"]; ?>" width="316" heigth="316">
        </article>
      </a>
      <a class="agenda-detail-link" href="index.php?page=detail&amp;id=<?php echo $event3["id"]; ?>">
        <article class="agenda-item">
          <?php $date = date_parse($event3['start']);?>
          <p class="agenda-item-date"><?php echo $date['day'] . '/' . $date['month']; ?></p>
          <h2 class="agenda-item-title"><?php echo $event3["title"]; ?></h2>
          <p class="agenda-item-info"><?php echo $event3['start_age']; ?> tot <?php echo $event3['end_age']; ?> jaar</p>
          <img class="agenda-item-img" src="./assets/img/events/small/<?php echo $event3['image'] ?>.png" alt="<?php echo $event3["title"]; ?>" width="316" heigth="316">
        </article>
      </a>
      <a class="agenda-detail-link" href="index.php?page=detail&amp;id=<?php echo $event4["id"]; ?>">
        <article class="agenda-item">
          <?php $date = date_parse($event4['start']);?>
          <p class="agenda-item-date"><?php echo $date['day'] . '/' . $date['month']; ?></p>
          <h2 class="agenda-item-title"><?php echo $event4["title"]; ?></h2>
          <p class="agenda-item-info"><?php echo $event4['start_age']; ?> tot <?php echo $event4['end_age']; ?> jaar</p>
          <img class="agenda-item-img" src="./assets/img/events/small/<?php echo $event4['image'] ?>.png" alt="<?php echo $event4["title"]; ?>" width="316" heigth="316">
        </article>
      </a>
    </div>
    <div class="agenda-link">
      <a href="index.php?page=agenda">Bekijk de volledige agenda</a>
    </div>
  </section>

  <section class="info pinkbanner">
    <h2 class="hidden">Over</h2>
    <article class="over-spekken">
      <h2>Spekken</h2>
      <p>Waar kan een kind moeilijk aan weerstaan? Snoep! En in Gent noemen ze snoep 'spekken'. Spekken zijn niet alleen om van te smullen, maar je hebt ze in alle kleuren, vormen en maten. Ons kindertheaterfestival wil ook deze 'diversiteit' extra in de verf zetten. Enerzijds door het aanbod per leeftijd, anderzijds door de diverse genres.</p>
      <a href="#">Meer over Spekken</a>
    </article>
    <article class="over-facebook">
      <h2 class="hidden">Sociale media</h2>
      <p>Volg ons op sociale media en blijf op de hoogte van onze laatste nieuwtjes en acties!</p>
      <a href="https://www.facebook.com/Spekken/" target="_blank"><img src="./assets/img/fblink.png" alt="facebook logo" width="286" height="63"><span class="hidden">onze Facebook pagina</span></a>
    </article>
  </section>

  <section class="nieuws-section">
    <h2 class="nieuws-title"><span class="hidden">Nieuws</span></h2>
    <article class="blog-article">
      <div>
        <h2>Voorstelling Toverdrank</h2>
        <p>Vandaag onze laatste spekkenvoorstelling van dit jaar: Joris en de geheimzinnige toverdrank van Theater De Kreet. Een bewerking naar het gelijknamige boek van Roald Dahl die dit jaar honderd zou zijn geworden en duidelijk nog niets van zijn aantrekkingskracht is verloren.
        <a class="blog-article-link" href="#">Lees verder...</a></p>
        <div class="blog-link">
          <a href="#">Meer nieuwsberichten</a>
        </div>
      </div>
      <img class="blogpicture" src="assets/img/blog_article.png" alt="voorstelling toverdrank" width="438" height="438" />
    </article>
  </section>
</main>
