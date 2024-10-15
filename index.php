<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pozzitivy Production</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/jpg" href="logos/PP.png"/>
</head>
<body>
    <?php 
        require_once "db.php";
    ?>
    <?php 
        require_once "blocks/header.php";
    ?>
    <main>
        <div class="top-image">
            <div class="black-square">
                <div class="info">
                    <h4>Avengers: <br>Endgame</h4>
                    <p>After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.</p>
                </div>
                <div class="buttons">
                    <button>Watch</button>
                    <button>Add To List</button>
                </div>
            </div>
        </div>
        <div class="sections">
            <section class="coming-soon">
                <h5>Coming Soon</h5>
                <div class="movie-cards-container">
                    <a href="filmpage.php?film=0" class="movie-card"></a>
                    <a href="seriespage.php" class="movie-card"></a>
                    <div class="movie-card"></div>
                    <div class="movie-card"></div>
                    <div class="movie-card"></div>
                </div>
            </section>
            <section class="Favourites">
                <h5>Fan Favourites</h5>
                <?php
                    $sql = "SELECT * FROM movies WHERE section_id=1;";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $movies = $query->fetchAll(PDO::FETCH_OBJ);
                ?>
                <div class="movie-cards-container">
                    <?php
                    foreach ($movies as $movie) {
                        $hours = floor($movie->duration / 60);
                        $minutes = $movie->duration % 60;
                        $image = htmlspecialchars($movie->cover, ENT_QUOTES, "UTF-8");
                        echo "<a class=\"movie-card\" style=\"background-image: url(".$image.");\">
                        <div class=\"shade-effect\">
                        <h6>".$movie->name."</h6>
                        <p>".$hours."h ".$minutes."m</p>
                        </div>
                        </a>";
                    }
                    ?>
                    <div class="movie-card"><div class="shade-effect"><h6>Interstellar</h6><p>2h 49m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Avatar</h6><p>3h 14m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>2001</h6><p>2h 29m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Dark Knight</h6><p>2h 32m</p></div></div>
                </div>
            </section>
            <section class="Newest">
                <h5>Newest</h5>
                <div class="movie-cards-container">
                    <div class="movie-card"><div class="shade-effect"><h6>Avatar 2</h6><p>3h 12m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Wonka</h6><p>1h 56m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>FNAF</h6><p>1h 49m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Oppenheimer</h6><p>3h 0m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Super Mario</h6><p>1h 32m</p></div></div>
                </div>
            </section>
            <section class="Kids">
                <h5>For The Little Ones</h5>
                <div class="movie-cards-container">
                    <div class="movie-card"><div class="shade-effect"><h6>TMNT</h6><p>1h 40m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Lego Movie</h6><p>1h 40m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Super Mario</h6><p>1h 32m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Minions 2</h6><p>1h 30m</p></div></div>
                    <div class="movie-card"><div class="shade-effect"><h6>Rio</h6><p>1h 36m</p></div></div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>