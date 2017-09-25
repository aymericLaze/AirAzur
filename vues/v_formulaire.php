<?php
?>
<form action="./index.php?action=ajoutReservation&idVols=<?php echo $idVols ?>" method="POST">
    <!-- a faire récuperer -->
    Nom:<input type="text" name="Nom" value="" /><br/>
    Prenom:<input type="text" name="Prenom" value="" /><br/>
    Adresse:<input type="text" name="Adresse" value="" /><br/>
    Code Postal:<input type="text" name="CP" value="" /><br/>
    Ville:<input type="text" name="Ville" value="" /><br/>
    Téléphone<input type="text" name="NumTel" value="" /><br/>
    Nombre de place à reserver<input type="text" name="Place" value="" /></label><br/>
    <input type="submit" value="Reserver" name="envoyer" />
    <input type="reset" value="Effacer" name="reset" />
</form>

