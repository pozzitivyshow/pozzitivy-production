<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pozzitivy Production</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="filmpage.css">
    <link rel="shortcut icon" type="image/jpg" href="PP.png"/>
</head>
<body>
    <?php 
        require_once "db.php";
    ?>
    <?php 
        require_once "blocks/header.php";
    ?>
    <main>
        <div class="fullscreen-video">
            <div class="video-controls">
                <div class="back-and-settings">
                    <div class="back-button"><img src="img/back-arrow.png"></div>
                    <div class="settings-button"><img src="img/setting.png"></div>
                </div>
                <div class="bottom-panels">
                    <div class="pause-info">
                        <div class="blurred-panel"><img src="img/moscow-title.png"></div>
                    </div>
                    <div class="playback-controls">
                        <div class="blurred-panel">
                            <div class="play-pause-button">
                                <div><img src="img/play-button-white.png" class="play-button-playback"></div>
                                <div><img src="img/pause-button-white-small.png" class="pause-button-playback"></div>
                            </div>
                            <div class="track-length-ratio">
                                <div class="total-length">
                                    <div class="played-length">

                                    </div>
                                </div>
                            </div>
                            <div class="sound-control-buttons">
                                <div class="sound-control-button-loud"><img src="img/sound-icon-white.png"></div>
                                <div class="sound-control-button-mute"><img src="img/sound-off-icon-white.png"></div>
                            </div>
                            <div class="fullscreen-button"><img src="img/fullscreen.png"></div>
                        </div>
                    </div>
                </div>
            </div>
            <video src="videos/moscowUncovered.mp4"></video>
        </div>
        <div class="episodes-popup">
            <div class="episodes-panel">
                <div class="top-panel">
                    <div class="seasons">
                        <div class="season">
                            <button><p>Season 1</p></button>
                            <button><p>Season 2</p></button>
                        </div>
                    </div>
                    <div class="close-button"><p>X</p></div>
                </div>
                <div class="episodes">
                    <div class="episode-card">
                        <div><img src="img/moscow-cover.png"></div>
                        <div class="product-info">
                            <div><p class="episode-number">Episode 1</p></div>
                            <div><p class="episode-title">I'm never going to Moscow again.</p></div>
                            <div><p class="episode-description">Pozzitivy records his flight and his first week in Moscow, which he spends in the heart of it</p></div>
                        </div>
                        <div class="play-button"><img class="button-images" src="img/play-button-white.png"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="film-image-moscow">
            <div class="gradient-over-image">
                <div class="blurred-description series">
                    <div  class="Title-Card"><img src="img/moscow-title.png"></div>
                    <div><p>Pozzitivy sets off on an adventure to the capital of Russia. Most people would believe that this experience isn't the most pleasant, however Pozzitivy proves those beliefs to be false.</p></div>
                    <button class="play-button control-button">
                        <img class="button-images" src="icons/play-button.png">
                        <p>Play</p>
                    </button>
                    <button class="episodes-button control-button">
                        <img class="button-images" src="img/episodes-icon-black.png">
                        <p>Episodes</p>
                    </button>
                    <button class="add-button control-button">
                        <img class="button-images" src="icons/plus-black.png">
                        <p>To List</p>
                    </button>
                </div>
            </div>
        </div>
        <section class="similar">
            <h5>Similar</h5>
            <div class="movie-cards-container">
                <a href="filmpage.php"><div class="movie-card"></div></a>
                <div class="movie-card"></div>
                <div class="movie-card"></div>
                <div class="movie-card"></div>
                <div class="movie-card"></div>
            </div>
        </section>
        <section class="also-by">
            <h5>Also by Pozzitivy Production</h5>
            <div class="movie-cards-container">
                <a href="filmpage.php?film=0" class="movie-card"></a>
                <a href="seriespage.php" class="movie-card"></a>
                <a href="" class="movie-card"></a>
                <a href="" class="movie-card"></a>
                <a href=" " class="movie-card"></a>
            </div>
        </section>
    </main>
    <script src="filmpage.js"></script>
</body>
</html>