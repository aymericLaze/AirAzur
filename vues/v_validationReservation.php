<h1>Confirmation de la reservation</h1>
<br/>
<br/>
<br/>

<fieldset>
    <legend><?php echo $_SESSION["idVol"] ?></legend>
    <br/>
    Nom : <?php echo $_SESSION["nom"] ?><br />
    Prenom : <?php echo $_SESSION["prenom"] ?><br />
    Adresse : <?php echo $_SESSION["adresse"] ." ".$_SESSION["CP"] ." ".$_SESSION["ville"]  ?><br/>
    Téléphone : <?php echo $_SESSION["numTel"] ?><br/>
    Nombre de place réservé : <?php echo $_SESSION["placePrise"] ?><br/>
    Prix : <?php echo $_SESSION["prixTotal"] ?>€<br/>
    <a href="./index.php?action=ajoutReservation">Valider</a>
</fieldset>