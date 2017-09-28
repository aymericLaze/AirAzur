<h1>Confirmation de la reservation</h1>
<br/>
<br/>
<br/>

<fieldset>
    <legend><?php echo $_SESSION["vol"]["idVol"] ?></legend>
    <br/>
    Nom : <?php echo $_SESSION["reservation"]["nom"] ?><br />
    Prenom : <?php echo $_SESSION["reservation"]["prenom"] ?><br />
    Adresse : <?php echo $_SESSION["reservation"]["adresse"] ." ".$_SESSION["reservation"]["CP"] ." ".$_SESSION["reservation"]["ville"]  ?><br/>
    Téléphone : <?php echo $_SESSION["reservation"]["numTel"] ?><br/>
    Nombre de place réservé : <?php echo $_SESSION["reservation"]["placePrise"] ?><br/>
    Prix : <?php echo $_SESSION["reservation"]["prixTotal"] ?>€<br/>
    <a href="./index.php?action=ajoutReservation">Valider</a>
</fieldset>