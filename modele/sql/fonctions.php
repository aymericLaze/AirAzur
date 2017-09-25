<?php
    
    //recuperation de la liste des vols
    function getLesVols()
    {
        //appel au fichier permettant la connection  a la bd
        require dirname(__FILE__)."../connction/connectPDO.php";
        
        $connexion = connect();
        
        try{
            //requete sql pour recuperer les vols disponible pour la reservation
            $sql =  "select idVols, A1.ville as aeroportDepart, A2.ville as aeroportArrivee, dateDepart, dateArrivee, prix, place
                    from vols JOIN aeroport as A1 ON vols.aeroportDepart=A1.idAeroport JOIN aeroport as A2 ON vols.aeroportArrivee=A2.idAeroport
                    where place>0";
            return $resultat = $connexion->query($sql);
            
        }
        catch(PDOException $e){
            return "Erreur dans la requête ".$e->getMessage();
        }
   }