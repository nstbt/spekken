<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <title>Spekken</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="./assets/img/icon.png" />
    <?php echo $css;?>
    <!-- <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/vars.css">
    <link rel="stylesheet" href="css/style.css"> -->
  </head>
  <body>

    <div class="container">
      <!-- <?php if(!empty($_SESSION['info'])): ?><div class="alert alert-success"><?php echo $_SESSION['info'];?></div><?php endif; ?> -->
      <!-- <?php if(!empty($_SESSION['error'])): ?><div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php endif; ?> -->

      <?php echo $content; ?>
      <?php include 'events/footer.php'; ?>
    </div>

    <?php echo $js;?>
  </body>
</html>
