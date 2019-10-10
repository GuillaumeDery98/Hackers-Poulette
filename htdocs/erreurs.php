<?php
if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && $_POST["sexe"] != "none" && !empty($_POST["mail"]) && $_POST["pays"] != "none" && !empty($_POST["message"])) {
    ?>
    <div class="col-12 valide">
        Formulaire envoyé !
    </div>
<?php
} else {
    ?>
    <div class="col-12 erreur">
        Veuillez complètez les champs avec des données valides.
    </div>
<?php
}
