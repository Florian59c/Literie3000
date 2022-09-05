<?php
$dsn = "mysql:host=localhost;dbname=literie3000;charset=UTF8";
$db = new PDO($dsn, "root", "");

$query = $db->query('SELECT lit.*, marque.nom_marque, dimension.taille
FROM lit
INNER JOIN marque
ON lit.id_marque = marque.id
INNER JOIN dimension
ON lit.id_taille = dimension.id
GROUP BY lit.id
');
$lits = $query->fetchAll(PDO::FETCH_ASSOC);

include("templates/header.php");

?>
<div class="container">
    <div class="btn btn-add">
        <a href="ajouter.php">Ajouter</a>
    </div>
    <?php
    foreach ($lits as $lit) {
    ?>
        <div class="lit">
            <div>
                <img src="<?= $lit["image"] ?>" alt="<?= $lit["nom"] ?>">
            </div>
            <div>
                <h1><?= $lit["nom"] ?></h1>
                <h2><?= $lit["nom_marque"] ?></h2>
                <h3><?= $lit["taille"] ?></h3>
            </div>
            <div>
                <h3><?= $lit["prix"] ?></h3>
                <h3><?= $lit["prix_reduit"] ?></h3>
            </div>
            <div class="btn">
                <a href="modifier.php?id=<?= $lit["id"] ?>">Modifier</a>
                <a href="supprimer.php?id=<?= $lit["id"] ?>">Supprimer</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
include("templates/footer.php");
?>