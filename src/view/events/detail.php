<header>
  <?php include 'navigation.php'; ?>
</header>

<main>
  <?php if(!empty($_SESSION['error'])): ?>
    <div class="detail-alert">
      <?php echo $_SESSION['error'];?>
      <br /><br />
      <a class="breadcrumb" href="index.php?page=agenda&amp;id=1"> Terug naar Agenda</a>
    </div>
  <?php endif; ?>
  <?php if(empty($_SESSION['error'])): ?>
    <article class="agenda-detail">
      <h2 class="detail-breadcrumbs"><a class="breadcrumb" href="index.php?page=agenda&amp;id=<?php echo $event['period']; ?>">Agenda</a> > <a class="breadcrumb" href="index.php?page=detail&amp;id=<?php echo $event['id']; ?>"><?php echo $event['title']; ?></a></h2>
      <div class="detail-top-flex">
        <picture class="detail-image">
          <source media="(min-width: 761px)" srcset="assets/img/events/big/<?php echo $event['image']; ?>.png" />
          <source media="(min-width: 300px)" srcset="assets/img/events/small/<?php echo $event['image']; ?>.png" />
          <img src="./assets/img/events/big/<?php echo $event['image']; ?>.png" alt="<?php echo $event['title']; ?>" width="568" height="568" />
        </picture>
        <section class="detail-praktisch">
          <div class="praktisch-column">
            <div class="praktisch-icons">
              <img src="./assets/img/time-icon.png" alt="icoon datum" width="50" height="50" />
              <div>
                <h3>Wanneer</h3>
                <?php $date = date_parse($event['start']);
                $monthNum = $date['month'];
                $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));?>
                <p><?php echo $date['day'] . ' ' . $monthName . ' ' . $date['year']; ?></p>
                <p><?php echo $date['hour'] . 'u' . $date['minute']; ?></p>
              </div>
            </div>
            <div class="praktisch-icons">
              <img src="./assets/img/where-icon.png" alt="icoon locatie" width="34" height="50" />
              <div>
                <h3>Waar</h3>
                <?php if ( empty($event['location']) ): ?>
                  <p>Er is geen locatie voor dit evenement.</p>
                <?php else: ?>
                  <p><?php echo $event['location']; ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="praktisch-icons">
              <img src="./assets/img/who-icon.png" alt="icoon performer" width="52" height="50" />
              <div>
                <h3>Wie</h3>
                <p><?php echo $event['performer']; ?></p>
              </div>
            </div>
          </div>
          <div class="praktisch-column">
            <div class="praktisch-icons">
              <img src="./assets/img/kids-icon.png" alt="icoon doelgroep" width="38" height="50" />
              <div>
                <h3>Doelgroep</h3>
                <p><?php echo $event['start_age']; ?> tot <?php echo $event['end_age']; ?> jaar</p>
              </div>
            </div>
            <div class="praktisch-icons">
              <img src="./assets/img/tags-icon.png" alt="icoon tags" width="46" height="50" />
              <div>
                <h3>Tags</h3>
                <?php if ( empty($event['tag']) ): ?>
                  <p>Er zijn geen tags voor dit evenement.</p>
                <?php else: ?>
                  <p><?php echo $event['tag']; ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="praktisch-icons">
              <img src="./assets/img/price-icon.png" alt="icoon prijs" width="47" height="50" />
              <div>
                <h3>Prijs</h3>
                <p>€ 10</p>
              </div>
            </div>
          </div>
        </section>
      </div>
      <h1 class="detail-title"><?php echo $event['title']; ?></h1>
      <section class="detail-description">
        <?php if ( empty($event['description']) ): ?>
          <p>Er is geen omschrijving voor dit evenement.</p>
        <?php endif; ?>
        <p><?php echo $event['description']; ?></p>
      </section>
    </article>
  <?php endif; ?>
</main>
