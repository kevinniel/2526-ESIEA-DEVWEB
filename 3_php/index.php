<?php
    require_once __DIR__ . "/FormService.php";

    // Ici c'est du PHP
    $a = [
        [
            "nom" => "Dune",
            "genre" => "Science-fiction",
            "annee" => 2021,
        ],
        [
            "nom" => "La La Land",
            "genre" => "Drame",
            "annee" => 2016,
        ],
        [
            "nom" => "Le Fabuleux Destin d'Amelie Poulain",
            "genre" => "Comedie",
            "annee" => 2001,
        ],
        [
            "nom" => "Parasite",
            "genre" => "Thriller",
            "annee" => 2019,
        ],
        [
            "nom" => "Interstellar",
            "genre" => "Science-fiction",
            "annee" => 2014,
        ],
    ];

    // dd = debug & die
    function dd($a) {
        echo("<pre>");
        echo("<code>");
        var_dump($a);
        die();
        echo("</code>");
        echo("</pre>");
    }
    
// première possibilité de boucle
    // foreach($a as $b) {
    //     echo("<br>");
    //     var_dump($b);
    // }
    // die();

    // dd($a);

    // Récupération des requetes HTTP en "GET":
    // dd($_GET);
    
    // Récupération des requetes HTTP en "POST":
    // dd($_POST);
    // array(3) {
    //     ["titre"]=>
    //     string(4) "toto"
    //     ["year"]=>
    //     string(4) "2000"
    //     ["genre"]=>
    //     string(5) "Drame"
    // }

    // Je veux traiter le formulaire pour qu'il s'affiche dans mon tableau
    // Je traite la méthode POST donc j'utilise la variable $_POST
    // function set_new_row($toto) {
    //     return [
    //         "nom" => $toto["titre"],
    //         "genre" => $toto["genre"],
    //         "annee" => $toto["year"],
    //     ];
    // }

    // Je crée mon objet formService
    $fs = new FormService($_POST);
    $a[] = $fs->set_new_row();


    // Ici je peux traiter mes données issues du formulaire en PHP.
?>



<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Films - Catalogue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
        <header>
            <div>
                <h1>Catalogue de films</h1>
                <div class="subtitle">Une sélection courte et élégante, prête à être enrichie par de nouveaux titres.</div>
            </div>
            <span class="badge">Sélection 2026</span>
        </header>

        <section class="grid">
            <div class="card">
                <div class="filters-title">Filtres</div>
                <div class="filters" aria-label="Filtres par genre">
                    <a class="filter-btn" href="?filter=tous">Tous</a>
                    <a class="filter-btn" href="?filter=drame">Drame</a>
                    <a class="filter-btn" href="?filter=science-fiction">Science-fiction</a>
                    <a class="filter-btn" href="?filter=comedie">Comédie</a>
                    <a class="filter-btn" href="?filter=thriller">Thriller</a>
                </div>
                <table id="content" aria-label="Tableau des films">
                    <caption>Films en vitrine</caption>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Genre</th>
                            <th>Année</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- on boucle sur notre tableau $a -->
                        <?php foreach($a as $b): ?>
                            <!-- Je veux filtrer les lignes par rapport au filter de l'URL -->
                            <?php if ($_GET["filter"] == "tous" || is_null($_GET["filter"]) ): ?>

                                <!-- Je veux mettre la ligne en rouge si on est sur du "drame" -->
                                <?php if($b["genre"] == "Drame"): ?>
                                    <tr class="danger">
                                <?php else: ?>
                                    <tr>
                                <?php endif; ?>
                                    <td><?php echo($b["nom"]); ?></td>
                                    <td class="genre"><?= $b["genre"]; ?></td>
                                    <td><?= $b["annee"]; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <!-- La soumission d'un formulaire déclenche une requete HTTP -->
                <!-- le "action" défini la destination de la requete HTTP -->
                <!-- http://localhost:8888/2526-ESIEA-DEVWEB/3_php/?titre=toto&annee=2000&genre=Drame -->
                <form id="submitform" action="" method="POST">
                    <div class="field">
                        <label for="titre">Nom du film</label>
                        <input id="titre" name="titre" type="text" placeholder="Ex. Inception" value="toto" />
                        <div id="titre_error" class="error-text titanic">Le nom du film est obligatoire.</div>
                    </div>
                    <div class="two">
                        <div class="field">
                            <label for="annee">Année</label>
                            <!-- C'est l'attribut "name=???" qui donne le nom de la variable pour -->
                            <!-- le futur traitement -->
                            <input id="annee" name="year" type="number" placeholder="Ex. 2010" value="2000" />
                            <div id="annee_error" class="error-text titanic">Merci de saisir une année valide.</div>
                        </div>
                        <div class="field">
                        <label for="genre">Genre</label>
                        <select id="genre" name="genre">
                            <option>Drame</option>
                            <option>Science-fiction</option>
                            <option>Comédie</option>
                            <option>Thriller</option>
                        </select>
                        <div id="genre_error" class="error-text titanic">Merci de choisir un genre.</div>
                        </div>
                    </div>
                    <button type="submit">Ajouter le film</button>
                    <div class="note">Formulaire non fonctionnel, uniquement pour la maquette HTML/CSS.</div>
                </form>
            </div>
        </section>
    </div>

    <div id="success" class="toast titanic" role="status" aria-live="polite">
        <span class="toast-dot" aria-hidden="true"></span>
        Film ajouté avec succès.
    </div>
    <!-- Normalement, on intègre le JS ICI -->
    <script>
        console.log("coucou tout le monde !");
        let a = 3;
        let b = 4;
        console.log(a+b);
    </script>
    <!-- <script src="script.js"></script> -->
</body>
</html>
