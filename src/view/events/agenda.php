<header>
  <?php include 'navigation.php'; ?>
</header>

<main>
  <?php $id = $_GET['id']; ?>
  <h2 class="agenda-pagina-title"><span class="hidden">Agenda</span></h2>
  <div class="filters">
    <form class="form">
      <select class="periodes" onchange="if (this.value) window.location.href=this.value">
        <?php if ( $id === '1'): ?>
          <option value="index.php?page=agenda&amp;id=1">Kerstvakantie</option>
          <option value="index.php?page=agenda&amp;id=2">Paasvakantie</option>
        <?php endif; ?>
        <?php if ( $id === '2'): ?>
          <option value="index.php?page=agenda&amp;id=2">Paasvakantie</option>
          <option value="index.php?page=agenda&amp;id=1">Kerstvakantie</option>
        <?php endif; ?>
      </select>
    </form>

    <div class="search">
      <div class="search-age">
        <p>Leeftijd</p>
        <a href="index.php?page=agenda&amp;id=<?php echo $id ?>&amp;start_age=2&amp;end_age=4">2 - 4</a>
        <a href="index.php?page=agenda&amp;id=<?php echo $id ?>&amp;start_age=4&amp;end_age=6">4 - 6</a>
        <a href="index.php?page=agenda&amp;id=<?php echo $id ?>&amp;start_age=6&amp;end_age=8">6 - 8</a>
        <a href="index.php?page=agenda&amp;id=<?php echo $id ?>&amp;start_age=8&amp;end_age=10">8 - 10</a>
      </div>
      <div class="search-tags">
        <p>Tags</p>
        <?php foreach($tags as $tag): ?>
          <a href="index.php?page=agenda&amp;id=<?php echo $id ?>&amp;tag=<?php echo $tag['tag']; ?>"><?php echo $tag['tag']; ?></a>
        <?php endforeach;?>
      </div>
    </div>

  </div>

  <section class="agenda-items agenda-pagina">
    <?php if(!empty($_SESSION['error'])): ?>
      <div class="alert alert-danger">
        <?php echo $_SESSION['error'];?>
      </div>
    <?php endif; ?>
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
        <a class="agenda-item-link" href="index.php?page=detail&amp;id=<?php echo $event["id"]; ?>">
          <div>
            Meer
          </div>
        </a>
      </article>
    <?php endforeach;?>
  </section>
</main>
