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

</header>

<main>
  <h2 class="agenda-pagina-title"><span class="hidden">Agenda</span></h2>
  <div class="filters">
    <select class="periodes">
      <option value="Kertvakantie">Kerstvakantie</option>
      <option value="Paasvakantie">Paasvakantie</option>
    </select>
    <form class="" action="index.php" method="post">
      <div class="">
        <label for="">Leeftijd</label>
        <input type="number" name="" min="1" max="12" value="1">
      </div>
      <div class="">
        <label for="">Tags</label>

      </div>
    </form>
  </div>

  <section class="agenda-items">
    <?php foreach($events as $event): ?>
      <article class="agenda-item">
        <?php $date = date_parse($event['start']);?>
        <p class="agenda-item-date"><?php echo $date['day'] . '/' . $date['month']; ?></p>
        <header><h2 class="agenda-item-title"><?php echo $event['title']; ?></h2></header>
        <p class="agenda-item-info"><?php echo $event['start_age'];?> tot <?php echo $event['end_age'];?> jaar</p>
        <p class="agenda-item-info">
            <?php foreach($event['tags'] as $tag): ?>
                <?php echo $tag['tag'] . ' ';?>
            <?php endforeach;?>
        </p>
        <img class="agenda-item-img" src="./assets/img/events/small/<?php echo $event['image'] ?>.png" alt="<?php echo $event['title'] ?>" width="316" heigth="316" />
        <div class="agenda-item-link">
          <a href="index.php?page=detail&amp;id=<?php echo $event["id"]; ?>">Meer</a>
        </div>
      </article>
    <?php endforeach;?>
  </section>
</main>
