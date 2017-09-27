<?php
    session_start();
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="./css/cssGeneral.css" />
        <title>Intranet Air Azur</title>
    </head>
    
    <body>
        <?php
        if(!isset($_REQUEST['action'])){
            $action='accueil';
        }
        else {
            $action=$_REQUEST['action'];
            include 'modele/sql/fonctions.php';
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
                $lesVols=getvols();
                include './vues/v_catalogue.php';
                break;
            case "reservation":
                //affiche la vue reservation
                include './vues/v_reservation.php';
                break;
            case "formulaire":
                $idVols=$_REQUEST["vol"];
                setVariableSession(getVols($idVols));
                //affiche la vue du formulaire de réservation
                include './vues/v_formulaire.php';
                break;
            case "validationReservation":
                //affiche la vue récapitulative de la reservation
                //faire test possible ou pas de reserver vol
                //récuperer prix total
                //if test(nombre de place valablre) is true -> faire ajout réservation
                //else renvoyer sur formulaire
                $idVols=$_REQUEST["idVols"];
                $nom=$_REQUEST["Nom"];
                $prenom=$_REQUEST["Prenom"];
                $adresse=$_REQUEST["Adresse"];
                $cp=$_REQUEST["CP"];
                $ville=$_REQUEST["Ville"];
                $tel=$_REQUEST["NumTel"];
                $placeRes=$_REQUEST["Place"];
                $prixTotal=prixTotal($idVols,$placeRes);
                include './vues/v_validationReservation.php';
                break;
            case "ajoutReservation":
                $idVols=$_REQUEST["idVols"];
                $nom=$_REQUEST["Nom"];
                $prenom=$_REQUEST["Prenom"];
                $adresse=$_REQUEST["Adresse"];
                $cp=$_REQUEST["CP"];
                $ville=$_REQUEST["Ville"];
                $tel=$_REQUEST["Tel"];
                $placeRes=$_REQUEST["Place"];
                $idVols=$_REQUEST["PrixTotal"];
                //ATTENTION A FAIRE : RECUP IDVOLS + PRIXTOTAL
                ajoutReservation($idVols,$nom,$prenom,$adresse,$cp,$ville,$tel,$placeRes,$prixTot);
                //ajoute la reservation dans la BDD
                echo "Votre vol a été reservé";
                
                break;
        }
        ?>
    </body>
</html>
