<?php
include("templates/header.php");

if (!empty($_POST)) {
    // le formulaire a été soumis
    $errors = [];

    $marque = trim(strip_tags($_POST["marque"]));
    $taille = trim(strip_tags($_POST["taille"]));
    $nom = trim(strip_tags($_POST["nom"]));
    $img = trim(strip_tags($_POST["img"]));
    $prix = trim(strip_tags($_POST["prix"]));
    $reduc = trim(strip_tags($_POST["reduc"]));

    // Si pas d'erreurs, insertion du lit en bdd
    if (empty($errors)) {
        
        $db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "");

        //creation du lit
        $query = $db->prepare("INSERT INTO lit (id_marque, id_taille, nom, image, prix, prix_reduit) values (:marque, :taille, :nom, :img, :prix, :reduc)");

        $query->bindParam(":marque", $marque);
        $query->bindParam(":taille", $taille);
        $query->bindParam(":nom", $nom);
        $query->bindParam(":img", $img);
        $query->bindParam(":prix", $prix);
        $query->bindParam(":reduc", $reduc);
        
        if ($query->execute()) {
            //rediriger vers la page d'acceuil
            header("location: index.php");
        }
    }
}
?>

<div class="container formulaire">
    <form action="" method="post">
        <div>
            <label for="inputMarque">numéro de la marque</label>
            <input type="text" id="inputMarque" name="marque" value="<?= isset($marque) ? $marque : "" ?>">
        </div>
        <div>
            <label for="inputTaille">numéro de la taille</label>
            <input type="text" id="inputTaille" name="taille" value="<?= isset($taille) ? $taille : "" ?>">
        </div>
        <div>
            <label for="inputNom">Nom du matelas</label>
            <input type="text" id="inputNom" name="nom" value="<?= isset($nom) ? $nom : "" ?>">
        </div>
        <div>
            <label for="inputImg">lien de l'image</label>
            <input type="text" id="inputImg" name="img" value="<?= isset($img) ? $img : "" ?>">
        </div>
        <div>
            <label for="inputPrix">Prix</label>
            <input type="text" id="inputPrix" name="prix" value="<?= isset($prix) ? $prix : "" ?>">
        </div>
        <div>
            <label for="inputReduc">prix avec reduction</label>
            <input type="text" id="inputReduc" name="reduc" value="<?= isset($reduc) ? $reduc : "" ?>">
        </div>
        </div>
        <div>
        <input class="validation" type="submit" value="Ajout d'un matelas">
        </div>
    </form>
    </div>

<?php
include("templates/footer.php");
?>