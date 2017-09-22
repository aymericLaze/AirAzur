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
            //Select * From vols where place <> 0
        }
   }