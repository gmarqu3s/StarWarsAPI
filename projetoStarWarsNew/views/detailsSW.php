<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars Movie Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/detailsstyle.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/favicon.ico">
</head>

<body>
    <!-- CONTENT -->
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <h1 class="display-6">Movie Details</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($film_selected)) { ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $film_selected['title'] ?> (Episode <?= $film_selected['episode_id'] ?>)</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Release Date:</strong>   <?= $film_selected['release_date']  ?></p>
                            <p><strong>Director:</strong>       <?= $film_selected['director']      ?></p>
                            <p><strong>Producers:</strong>      <?= $film_selected['producer']      ?></p>
                            <p><strong>Synopsis:</strong>       <?= $film_selected['opening_crawl'] ?></p>
                            <p><strong>Characters:</strong></p>
                            <ul>
                                <?php foreach ($film_selected['character_names'] as $character) { ?>
                                    <li><?= $character ?></li>
                                <?php } ?>
                            </ul>
                            <p><strong>Age of the Film:</strong> <?= $film_selected['film_age'] = $this->calculateFilmAge($film_selected['release_date']); ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="button" class="btn btn-secondary" onclick="voltar()">Back</button>
                            <a href="index.php" class="btn btn-dark">Home</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning" role="alert">
                        No movie found. Please select a valid movie.
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- /CONTENT -->

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function voltar() {
            window.close();
        }
    </script>

</body>

</html>
