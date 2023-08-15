<?php

session_start();

if (!isset($_SESSION['pontok'])) {
  $_SESSION["pontok"] = 0;
}

?>
<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>PHP gyakorlás</title>
</head>

<body>
  <?php

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $connection = mysqli_connect("localhost", "root", "12345", "gyakorlas5");

  $error = mysqli_error($connection);
  mysqli_set_charset($connection, "utf8mb4");

  if ($error) {
    print $error;
  }

  $kerdesek = mysqli_query($connection, "select * from kviz");
  $kerdes = mysqli_fetch_array($kerdesek);

  ?>
  <main class="container py-5">
    <section class="row row-cols-1">
      <article class="col">
        <form method="post" class="text-center container py-5">
          <label for="kerdes<?php print $kerdes["id"] ?>" class="form-label">
            <h2><?php print $kerdes["kerdes"] ?></h2>
          </label>
          </label>
          <div class="row row-cols-1 gap-3 py-3">
            <div class="col d-flex gap-3 form-check">
              <input type="radio" id="valasz1" name="<?php print $kerdes["valasz1"] ?>" class="form-check-input" value="<?php print $kerdes["valasz1"] ?>">
              <label for="valasz1" class="form-check-label"><?php print $kerdes["valasz1"] ?></label>
            </div>

            <div class="col d-flex gap-3 form-check">
              <input type="radio" id="valasz2" name="<?php print $kerdes["valasz2"] ?>" class="form-check-input" value="<?php print $kerdes["valasz2"] ?>">
              <label for="valasz2" class="form-check-label"><?php print $kerdes["valasz2"] ?></label>
            </div>

            <div class="col d-flex gap-3 form-check">
              <input type="radio" id="valasz3" name="<?php print $kerdes["valasz3"] ?>" class="form-check-input" value="<?php print $kerdes["valasz3"] ?>">
              <label for="valasz3" class="form-check-label"><?php print $kerdes["valasz3"] ?></label>
            </div>

            <div class="col d-flex gap-3 form-check">
              <input type="radio" id="valasz4" name="<?php print $kerdes["valasz4"] ?>" class="form-check-input" value="<?php print $kerdes["valasz4"] ?>">
              <label for="valasz4" class="form-check-label"><?php print $kerdes["valasz4"] ?></label>
            </div>

          </div>
          <button type="submit" class="btn btn-secondary" name="kerdes<?php print $kerdes["id"] ?>">Küldés</button>
          </div>
        </form>

        <?php

        $jovalasz = $kerdes["jovalasz"];
        $pontszam = $_SESSION["pontok"];
        $hiba = 0;
        // print_r($_POST);

        // Bölömbika, Fülemüle, Harkály, Jak // szóközökkel gond lesz
        if (isset($_POST["kerdes1"])) {
          // name-re hivatkozás szóközökre vigyázni mert alulvonást tesz helyére
          foreach ($_POST as $post) {
            if ($post !== $jovalasz) {
              $hiba = 1;
            }
            else {
              $hiba = 0;
            }

            if($hiba === 0) {
              $pontszam += 1;
              print "<div>jó a válasz</div>";
            }
            // else esetén kiírja mindkét választ
            // else {
            //   print "<div>hibás válasz</div>";
            // }
          }

        }

        ?>
        <hr>
        <h3>Pontszám: <?php print $pontszam ?></h3>
        <h4>Jó válasz: <?php print $jovalasz ?></h4>
      </article>
    </section>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js" integrity="sha512-9GacT4119eY3AcosfWtHMsT5JyZudrexyEVzTBWV3viP/YfB9e2pEy3N7WXL3SV6ASXpTU0vzzSxsbfsuUH4sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>