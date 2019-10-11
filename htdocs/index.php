<?php
//vérification des formulaires
if (isset($_GET["rendu"])) {
    if (!preg_match("/^[a-zA-Z ]*$/", $_POST["nom"])) {
        $_POST["nom"] = "";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $_POST["prenom"])) {
        $_POST["prenom"] = "";
    }
    $_POST['mail'] = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $_POST["mail"] = "";
    }
    $_POST["message"] = preg_replace("/\<script(?:.*?)\<\/script\>/", "", $_POST["message"]);
    //mise de $_POST dans des variables classiques
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    if ($_POST["sexe"] != "none") {
        $sexe = $_POST["sexe"];
    } else {
        $sexe = "";
    }

    $mail = $_POST["mail"];
    if ($_POST["pays"] != "none") {
        $pays = $_POST["pays"];
    } else {
        $pays = "Veuillez choisir une option";
    }
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 logorow">
                <img src="images/logo.png" class="logo" alt="logo">
            </div>
        </div>
        <?php //inclusion du message d'erreur/de validation si besoin
        if (isset($_GET["rendu"])) { ?>
            <div class="row erreurpadding">

                <?php
                    include('erreurs.php');
                    ?>

            </div>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-12">
                <div class="jumbotron message">
                    <h2 class="display-4">Contactez-nous !</h2>
                    <p class="lead">Voici un petit formulaire vous permettant de nous contacter. N'hésitez pas à l'utiliser pour le moindre problème ou demande.<br>(<span class="obligatoire"><span class="obligatoire">*</span></span> = champ obligatoire)</p>
                </div>
            </div>
        </div>

        <form method="POST" action="index.php?rendu=1">
            <div class="form-row">
                <div class="col-12 col-md-6">
                    <label for=" nom">Nom<span class="obligatoire"><span class="obligatoire">*</span></span></label>
                    <?php //Formulaire + encadrement en rouge si besoin + pré-remplissage si besoin 
                    ?>
                    <input type="text" name="nom" id="nom" class="form-control <?php if ((empty($_POST["nom"])) && isset($_GET["rendu"])) {
                                                                                    echo "rouge";
                                                                                } ?>" placeholder="Nom" value="<?php if (isset($_GET["rendu"])) {
                                                                                                                    echo $nom;
                                                                                                                }  ?>">
                </div>
                <div class="col-12 col-md-6">
                    <label for="prenom">Prénom<span class="obligatoire"><span class="obligatoire">*</span></span></label>
                    <input type="text" name="prenom" id="prenom" class="form-control <?php if ((empty($_POST["prenom"])) && isset($_GET["rendu"])) {
                                                                                            echo "rouge";
                                                                                        } ?>" placeholder="Prénom" value="<?php if (isset($_GET["rendu"])) {
                                                                                                                                echo $prenom;
                                                                                                                            }  ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-md-6">
                    <label for="sexe">Sexe<span class="obligatoire"><span class="obligatoire">*</span></span></label>
                    <select name="sexe" id="sexe" class="form-control <?php if ($_POST["sexe"] == "none" && isset($_GET["rendu"])) {
                                                                            echo "rouge";
                                                                        } ?>">
                        <?php
                        if ($_GET["rendu"] == 1 && $sexe != "none") {
                            if ($sexe == "homme") {
                                ?><option value="homme">Homme</option><?php
                                                                            } else {
                                                                                ?><option value="femme">Femme</option><?php
                                                                                                                            }
                                                                                                                        } else {
                                                                                                                            ?><option value="none">Veuillez choisir une option</option><?php
                                                                                                                                                                                        }
                                                                                                                                                                                        ?>

                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="mail">Adresse mail<span class="obligatoire"><span class="obligatoire">*</span></span></label>
                    <input type="mail" name="mail" id="mail" class="form-control <?php if ((empty($_POST["mail"])) && isset($_GET["rendu"])) {
                                                                                        echo "rouge";
                                                                                    } ?>" placeholder="email@adresse.com" value="<?php if (isset($_GET["rendu"])) {
                                                                                                                                        echo $mail;
                                                                                                                                    }  ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-md-6">
                    <label for="pays">Pays<span class="obligatoire"><span class="obligatoire">*</span></span></label>
                    <select name="pays" id="pays" class="form-control <?php if ($_POST["pays"] == "none" && isset($_GET["rendu"])) {
                                                                            echo "rouge";
                                                                        } ?>">
                        <?php
                        if ($_GET["rendu"] == 1 && $pays != "none") {
                            ?><option value="<?php echo $pays ?>"><?php echo $pays; ?></option><?php
                                                                                                } else {
                                                                                                    ?><option value="none">Veuillez choisir une option</option><?php
                                                                                                                                                                }

                                                                                                                                                                include("pays.php"); ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="sujet">Sujet</label>
                    <select name="sujet" id="sujet" class="form-control">
                        <?php
                        if ($_GET["rendu"] == 1 && $sujet != "autre") {
                            if ($sujet == "demande") {
                                ?><option value="demande">Demande</option><?php
                                                                                } else {
                                                                                    ?><option value="sav">S.A.V</option><?php
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>
                        <option value="autre">Autre</option>
                        <option value="demande">Demande</option>
                        <option value="sav">S.A.V</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12"></div>
                <label for="message">Votre message<span class="obligatoire"><span class="obligatoire">*</span></span></label>
                <textarea type="textarea" name="message" id="message" class="form-control <?php if ((empty($_POST["message"])) && isset($_GET["rendu"])) {
                                                                                                echo "rouge";
                                                                                            } ?>" placeholder="Votre message"><?php if (isset($_GET["rendu"])) {
                                                                                                                                    echo $message;
                                                                                                                                }  ?></textarea>
            </div>
            <div class="col-sm-12 d-flex justify-content-end">
                <input type="text" class="honey" name="pot">
                <button type="submit" class="btn btn-primary mb-2 submit">Envoyer</button>
            </div>

        </form>

    </div>
</body>

</html>