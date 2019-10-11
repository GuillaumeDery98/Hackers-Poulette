<?php
if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && $_POST["sexe"] != "none" && !empty($_POST["mail"]) && $_POST["pays"] != "none" && !empty($_POST["message"]) && empty($_POST["pot"])) {
    ?>
    <div class="col-12 valide">
        Formulaire envoyé !

        <?php
            include("mail.php");
            //insérez requête SQL ici 
            unset($_POST);
            unset($_GET);
            $nom = "";
            $prenom = "";
            $mail = "";
            $message = "";
            ?>
    </div>
<?php
} else {
    ?>
    <div class="col-12 erreur">
        Veuillez complètez les champs avec des données valides.
    </div>
<?php
}
