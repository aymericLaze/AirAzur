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
                initSession("vol");
                ajouterAuPanier("vol", getVols($idVols));
                //affiche la vue du formulaire de réservation
                include './vues/v_formulaire.php';
                break;
            case "validationReservation":
                                
                //creation variable de session avec les variables post du formulaire
                initSession("reservation");
                ajouterAuPanier("reservation", $_POST);
                //calcul du prix total et ajout dans session["reservation"]
                $_SESSION["reservation"]["prixTotal"] = prixTotal($_SESSION["reservation"]["placePrise"]);
                
                //affiche la vue de la validation
                include './vues/v_validationReservation.php';
                break;
            case "ajoutReservation":
                //ajoute la reservation a la base de donnée
                ajoutReservation(   $_SESSION["vol"]["idVol"],
                                    $_SESSION["reservation"]["nom"],
                                    $_SESSION["reservation"]["prenom"],
                                    $_SESSION["reservation"]["adresse"],
                                    $_SESSION["reservation"]["CP"],
                                    $_SESSION["reservation"]["ville"],
                                    $_SESSION["reservation"]["numTel"],
                                    $_SESSION["reservation"]["placePrise"],
                                    $_SESSION["reservation"]["prixTotal"]
                                );
                decrementerVol();
                //ajoute la reservation dans la BDD
                echo "Votre vol a été reservé";
                session_destroy();
                break;
            case "creationPDF":
                //créer le pdf pour la reservation correspondante
                
                $reservations= getLaReservation($_REQUEST["id"]);
                
                include './modele/pdf.php';
                
            
        } 
        
        //affiche le footer
            include './vues/v_footer.php';
       ?>
 
