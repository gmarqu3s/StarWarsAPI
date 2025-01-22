<!doctype html>
<html class="no-js" lang="">
<head>
    <!-- PAGE STYLES -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Star Wars API</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="icon" type="image/png" sizes="16x16" href="public/favicon.ico"> <!-- verificar, nao esta funcioanndo -->
	<!-- /PAGE STYLES -->
</head>
<body>
    <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-dark">
        </nav>
	<!-- /HEADER -->
    <!-- container-fluid -->
	<!-- CONTENT -->
        <div class="container">
            <form method="GET" action="index.php">
                <fieldset><legend>Star Wars explorer movies</legend></fieldset>
                <div class="row">
                    <div class="form-group">
                        <input type="hidden" name="action" value="showFilmCatalog">
                        <input type="text" name="query" placeholder="Ex. A New Hope">
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success action" data-tipo="send_data">SEARCH</button>
                    </div>
                </div>
                </br>
                <div class="row">
                    <h2>List of movies</h2>
                    <ul>
                        <?php if (!empty($films)){ ?>
                            <?php foreach ($films as $key => $value) {?>
                                <li>
                                    <a>
                                        <a class="film-title" data-id="<?=$value['episode_id']?>">
                                            <strong><?=$value['title']?></strong><br>
                                        </a>
                                    </a>
                                    <em>Launch:</em> <?=$value['release_date']?><br>
                                    <em>Director:</em> <?=$value['director']?>
                                </li>
                            <?php } ?>
                        <?php }else{ ?>
                            <p>No movies found.</p>
                        <?php } ?>
                    </ul>
                </div>
            </form>
        </div>
	<!-- /CONTENT -->
	<!-- /.container-fluid -->
	<!-- PAGE SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".film-title").click(function(event){
                    event.preventDefault();
                    var id = $(this).data("id");

                    $.ajax({
                        type: "POST",
                        url: "index.php?action=detailsSW=episode_id=" + id,
                        data: {id: id},
                        dataType: "html",
                        success: function (response) {
                            console.log('success!');
                            var newWindow = window.open("views/detailsSW.php?action=detailsSW=episode_id=" + id, "_blank");
                            newWindow.document.write(response);
                            // newWindow.document.close();
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });

                });
            });
        </script>
	<!-- /PAGE SCRIPTS -->
</body>
</html>
