<header>
  <nav>
    <ul>
      <li><a href="index.php"><img src="./assets/img/logo.png" alt="spekken logo" width="482" height="45"></a></li>
      <li><a class="nav-item" href="index.php?page=agenda">Agenda</a></li>
      <li><a class="nav-item" href="#">Praktisch</a></li>
      <li><a class="nav-item" href="#">Nieuws</a></li>
    </ul>
  </nav>

</header>

<main>
  <select class="periodes">

  </select>
  <section class="agenda-items">
    <?php foreach($events as $event): ?>
      <article class="agenda-item">
        <header><h2 class="agenda-item-title"><?php echo $event['title']; ?></h2></header>
        <p class="agenda-item-info"><?php echo $event['start_age'];?> tot <?php echo $event['end_age'];?> jaar</p>
        <?php $date = date_parse($event['start']);?>
        <p class="agenda-item-date"><?php echo $date['day'] . '/' . $date['month']; ?></p>
        <p class="agenda-item-info"><?php foreach($event['tags'] as $tag): ?><?php echo $tag['tag'] . ' ';?><?php endforeach;?></p>
        <img class="agenda-item-img" src="./assets/img/events/small/<?php echo $event['image'] ?>.png" alt="<?php echo $event['title'] ?>" width="320" heigth="315">
        <div class="agenda-item-link">
          <a href="index.php?page=detail&amp;id=<?php echo $event["id"]; ?>">Meer</a>
        </div>
      </article>
    <? endforeach;?>
  </section>
</main>
