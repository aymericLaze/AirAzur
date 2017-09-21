<?php
    
    function connect()
    {
        include 'connect.php';
        
        try
        {
        return new PDO('mysql:host='.HOST.';dbname='.DBNAME.'',USER,MDP);
        }
        catch(PDOException $message)
        {
            echo "probleme de connection".$message->getMessage();
        }
    }
?>