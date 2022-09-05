<?php

$dsn = "mysql:host=localhost;dbname=literie3000;charset=UTF8";
$db = new PDO($dsn, "root", "");

$query = $db->prepare('DELETE FROM lit WHERE id = :id');
$query->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
$query->execute();

include("templates/header.php");

?>

<div class="container suppr">
    <h1>Le matelas à été supprimer</h1>
    <a href="index.php">Cliquez ici pour retourner à la page d'accueil</a>
</div>
<?php
include("templates/footer.php");
?>