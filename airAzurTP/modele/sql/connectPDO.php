<?php
    //fonction de connexion a la base de donnee
    function connect()
    {
        include_once  'configPDO.php';
        
        try
        {
        return new PDO('mysql:host='.HOST.';dbname='.DBNAME.'',USER,MDP);
        }
        catch(PDOException $message)
        {
            echo "probleme de connection ".$message->getMessage();
        }
    }
?>