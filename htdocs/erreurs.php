<?php
if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && $_POST["sexe"] != "none" && !empty($_POST["mail"]) && $_POST["pays"] != "none" && !empty($_POST["message"])) {
    echo "Formulaire envoyé !";
} else {
    echo "Veuillez complètez les champs avec des données valides.";
}
