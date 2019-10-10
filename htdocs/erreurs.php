<?php
if(empty($_POST["nom"]) && empty($_POST["prenom"]) && empty($_POST["sexe"]) && && empty($_POST["mail"])  && empty($_POST["pays"])  && empty($_POST["sujet"])  && empty($_POST["message"]) ){
    echo "1";
}else{
    echo "2";
}
