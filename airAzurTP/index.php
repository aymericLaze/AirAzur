<?php
    session_start();
?>


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
                $reservations=getReservations();
                include './vues/v_reservation.php';
                break;
            case "formulaire":
                //recuperation idVol
                $idVols=$_REQUEST["vol"];
                //creer variable de session avec info du vol
                setVariableSession(getVols($idVols));
                //affiche la vue du formulaire de réservation
                include './vues/v_formulaire.php';
                break;
            case "validationReservation":
                                
                //creation variable de session avec les variables post du formulaire
                setVariableSession($_POST);
                //calcul du prix total
                $_SESSION["prixTotal"] = prixTotal($_SESSION["prix"], $_SESSION["placePrise"]);
                
                //affiche la vue de la validation
                include './vues/v_validationReservation.php';
                break;
            case "ajoutReservation":
                //ajoute la reservation a la base de donnée
                ajoutReservation($_SESSION["idVol"],$_SESSION["nom"],$_SESSION["prenom"],$_SESSION["adresse"],$_SESSION["CP"],$_SESSION["ville"],$_SESSION["numTel"],$_SESSION["placePrise"],$_SESSION["prixTotal"]);
                //supprime le nombre de place
                decrementerVol();
                
                include './vues/v_ajoutReservation.php';
                break;
        } 
        
        //affiche le footer
            include './vues/v_footer.php';
       ?>
 
