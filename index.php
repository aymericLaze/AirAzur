<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="ISO-8859-1">
        <link rel="stylesheet" href="./css/cssGeneral.css" />
        <title></title>
    </head>
    <body>
        <?php
        include 'modele/sql/fonctions.php';
        // put your code here
        if(!isset($_REQUEST['action'])){
            $action='accueil';
        }
        else {
            $action=$_REQUEST['action'];
        }
        //affiche le header
        include './vues/v_header.php';
        switch($action){
            case "accueil":
                //affiche la vue accueil
                include './vues/v_accueil.php';
                break;
            case "catalogue":
                //affiche la vue catalogue
                $lesVols=getLesvols();
                include './vues/v_catalogue.php';
                break;
            case "reservation":
                //affiche la vue reservation
                include './vues/v_reservation.php';
                break;
            case "formulaire":
                //affiche la vue du formulaire de réservation
                include './vues/v_formulaire.php';
                break;
            case "ajoutRes":
                $nom=$_REQUEST["Nom"];
                $prenom=$_REQUEST["Prenom"];
                $adresse=$_REQUEST["Adresse"];
                $cp=$_REQUEST["CP"];
                $ville=$_REQUEST["Ville"];
                $tel=$_REQUEST["NumTel"];
                $placeRes=$_REQUEST["Place"];
                ajoutRes($idVols,$nom,$prenom,$adresse,$cp,$ville,$tel,$placeRes);
                //ajoute la reservation dans la BDD
                //faire la fonction/requete
                break;
        }
        ?>
    </body>
</html>
