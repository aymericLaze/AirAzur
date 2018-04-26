<?php
    //sessions et cookies
    session_start();
    
    if(!isset($_REQUEST['action'])){
        $action='accueil';
    }
    else {
        $action=$_REQUEST['action'];
        include 'modele/sql/fonctions.php';
    }
    //affiche le header
    if ($action!='creationPDF'){
        include './vues/v_header.php';
    }
    switch($action){
        case "accueil":
            //affiche la vue accueil
            include './vues/v_accueil.php';
            break;

        case "catalogue":
            //affiche la vue catalogue
            $lesVols = getLesVols();
            include './vues/v_catalogue.php';
            break;

        case "reservation":
            if(isset($_COOKIE['reservation'])) {
                //affiche la vue reservation
                $reservations=getReservations();
                if(count($reservations) != 0) {
                    include './vues/v_reservation.php';
                }
                else {
                    setcookie("reservation");
                    include './vues/v_zeroReservation.php';
                }
            } else {
                include './vues/v_zeroReservation.php';
            }
            break;

        case "formulaire":
            //recuperation idVol
            $idVol=$_REQUEST["vol"];
            //creer variable de session avec info du vol
            initSession("vol");
            ajouterAuPanier("vol", getLeVol($idVol));
            //affiche la vue du formulaire de réservation
            include './vues/v_formulaire.php';
            break;

        case "validationReservation":
            //creation variable de session avec les variables post du formulaire
            initSession("reservation");
            ajouterAuPanier("reservation", $_POST);
            //calcul du prix total et ajout dans session["reservation"]
            $_SESSION["reservation"]["prixTotal"] = prixTotal($_SESSION["reservation"]["placePrise"]);
            //ajout de l'id du vol dans la reservation
            $_SESSION["reservation"]["idVol"] = $_SESSION["vol"]["idVols"];
            unset($_SESSION["vol"]);
            //affiche la vue de la validation
            include './vues/v_validationReservation.php';
            break;

        case "ajoutReservation":
            //ajoute la reservation a la base de donnée et au cookie
            ajoutReservation();
            ajouterAuCoockie();
            
            echo "Votre vol a été reservé";
            session_destroy();
            break;

        case "creationPDF":
            //créer le pdf pour la reservation correspondante

            $reservations= getLaReservation($_REQUEST["id"]);
            $vol= getLeVol($reservations["idVols"]);
            include 'vues/pdfReservation.php';
            creerPDF($reservations,$vol);
            break;
        
        case "suppression-reservation":
            //supprimer une reservation du tableau
            
            $reservation = $_REQUEST["id"];
            echo deleteVol($reservation);
            
            //redirection vers reservation
            //header('Location: index.php?action=reservation');
    } 

    //affiche le footer
         if ($action!="creationPDF"){

        include './vues/v_footer.php';
         }
   ?>