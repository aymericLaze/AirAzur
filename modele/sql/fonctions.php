<?php
    
    require dirname(__FILE__)."requetesSQL.php";
    
    //recuperation de la liste des vols
    function getLesVols()
    {
        //declaration d'un tableau
        $listeVols = array();
        
        //appel au fichier permettant la connection  a la bd
        require dirname(__FILE__)."../connction/connectPDO.php";
        
        $connexion = connect();
        
        if($connexion)
        {  
            //requete sql :
            //select idVols, A1.ville as aeroportDepart, A2.ville as aeroportArrivee, dateDepart, dateArrivee, prix, place
            //from vols JOIN aeroport as A1 ON vols.aeroportDepart=A1.idAeroport JOIN aeroport as A2 ON vols.aeroportArrivee=A2.idAeroport
            //where place>0
        }
   }