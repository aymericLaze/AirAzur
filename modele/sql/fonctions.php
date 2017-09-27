<?php

    //connexion a la bdd
    include "connectPDO.php";  
    
   
    
    //fonction de recuperation de la liste des vols
    //variable par defaut pour changer la requete sql
    function getVols($unVol = NULL)
    {
        
        //creation d'un objet PDO
        $connexion = connect();
        
        try{
            //creation d'un tableau
            $lesVols = array();
            //index
            $i=0;
            
            //requete sql pour recuperer les vols disponible pour la reservation
            $sql =  "select idVols, A1.ville as aeroportDepart, A2.ville as aeroportArrivee, dateDepart, dateArrivee, prix, place
                    from vols JOIN aeroport as A1 ON vols.aeroportDepart=A1.idAeroport JOIN aeroport as A2 ON vols.aeroportArrivee=A2.idAeroport
                    where place>0";
            
            //recupere juste les champs du vol passe en parametre
            if(isset($unVol))
            {
                $sql = $sql . " and idVols="."'".$unVol."'";
            }
            
            //execution de la requete
            $resultatVol = $connexion->query($sql);
            //return $resultat = $connexion->query($sql);
            
            //parcours des resultats et stockage dans tableau
            while($vol = $resultatVol->fetch(PDO::FETCH_OBJ))
            {
                $unVol = array(
                            "idVol"=>$vol->idVols,
                            "aeroportDepart"=>$vol->aeroportDepart,
                            "aeroportArrivee"=>$vol->aeroportArrivee,
                            "dateDepart"=>$vol->dateDepart,
                            "dateArrivee"=>$vol->dateArrivee,
                            "prix"=>$vol->prix,
                            "place"=>$vol->place
                            );
                //ecriture d'un vol dans le tableau a renvoyer
                $lesVols[$i] = $unVol;
                $i++;
            }
            return $lesVols;
        }
        catch(PDOException $e){
            return "Erreur dans la requête ".$e->getMessage();
        }
    }
    

    
   //fonction de reservation dans la bdd
   function ajoutReservation($idVols,$nom,$prenom,$adresse,$cp,$ville,$tel,$placeRes,$prixTot){
       //connexion a la bdd
       $connexion=connect();
       try{
           //requete pour ajouter les réservations dans la BDD
           $sql = "insert into reservation(idVols,nom,prenom,adresse,cp,ville,tel,nbPlaceReservee,prixTotal)"
               . "values($idVols,$nom,$prenom,$adresse,$cp,$ville,$tel,$placeRes,$prixTot)";
           $connexion->query($sql);
        }
       catch(PDOException $e){
            return "Erreur dans la requête ".$e->getMessage();
        }
    }
   
   
   
   //fonction pour calculer le prix total des places
   function prixTotal($idVols,$nbrPlace)
   {
        return $nbrPlace * $_SESSION["prix"];
   }
   
   
   
   //fonction pour mettre les champs d'un vol variable de session
   function setVariableSession($champsVol){
       foreach($champsVol as $indice=>$vol)
            {
            $_SESSION["idVol"] = $vol["idVol"];
            $_SESSION["prix"] = $vol["prix"];
            $_SESSION["place"] = $vol["place"];
            }
   }
