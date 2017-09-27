<?php

    //connexion a la bdd
    include "connectPDO.php";  
    
   
    
    //fonction de recuperation de la liste des vols
    //variable par defaut pour changer la requete sql
    function getVols($unVol = NULL)
    {
        
        //creation d'un objet PDO
        $connexion = connect();
        
        //parametre non vide
        $estNonVide = isset($unVol);
        
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
            if($estNonVide)
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
                            "placeDisponible"=>$vol->place
                            );
                //ecriture d'un vol dans le tableau a renvoyer
                $lesVols[$i] = $unVol;
                $i++;
            }
            
            if($estNonVide)
            {
                return $lesVols[0];
            }
            else
            {
                return $lesVols;
            }
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
           $sql = "insert into reservation(idVols,nomClient,prenomClient,adresseClient,codePostalClient,villeClient,telClient,nbPlaceReservee,prixTotal)"
               . "values('$idVols','$nom','$prenom','$adresse',$cp,'$ville','$tel',$placeRes,$prixTot)";
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
   
   
   
   //fonction pour mettre des champs en variable de session
   //parametre : tableau
   function setVariableSession($champsVol){
       foreach($champsVol as $indice=>$vol)
            {
                //ajoute variable session
                $_SESSION[$indice] = $vol;
            }
   }
   
   
   //fonction de recuperation de la liste des reservations
   function getReservations()
   {
        
        //creation d'un objet PDO
        $connexion = connect();
        
        try{
           
            //requete sql pour recuperer les reservations
            $sql =  "select idReservation, idVols, nomClient, prenomClient, adresseClient, codePostalClient,villeClient,telClient,prixTotal,nbPlaceReservee "
                    . "from reservation";
             //creation d'un tableau
            $lesRes = array();
            //index
            $i=0;
          
            //execution de la requete
            $resultatRes = $connexion->query($sql);
            //return $resultat = $connexion->query($sql);
            
            //parcours des resultats et stockage dans tableau
            while($res = $resultatRes->fetch(PDO::FETCH_OBJ))
            {
                $unRes = array(
                            "idReservation"=>$res->idReservation,
                            "idVols"=>$res->idVols,
                            "nomClient"=>$res->nomClient,
                            "prenomClient"=>$res->prenomClient,
                            "adresseClient"=>$res->adresseClient,
                            "codePostalClient"=>$res->codePostalClient,
                            "villeClient"=>$res->villeClient,
                            "telClient"=>$res->telClient,
                            "prixTotal"=>$res->prixTotal,
                            "nbPlaceReservee"=>$res->nbPlaceReservee
                            );
                //ecriture d'un vol dans le tableau a renvoyer
                $lesRes[$i] = $unRes;
                $i++;
            }
            return $lesRes;
        }
        catch(PDOException $e){
            return "Erreur dans la requête ".$e->getMessage();
        }
    }
