<?php
?>
<form action="./index.php?action=ajoutReservation" method="POST">
    <!-- a faire r�cuperer -->
    <label>Nom:<input type="text" name="Nom" value="" /></label><br/>
    <label>Prenom:<input type="text" name="Prenom" value="" /></label><br/>
    <label>Adresse:<input type="text" name="Adresse" value="" /></label><br/>
    <label>Code Postal:<input type="text" name="CP" value="" /></label><br/>
    <label>Ville:<input type="text" name="Ville" value="" /></label><br/>
    <label>T�l�phone<input type="text" name="NumTel" value="" /></label><br/>
    <label>Nombre de place � reserver<input type="text" name="Place" value="" /></label><br/>
    <input type="submit" value="Reserver" name="envoyer" />
    <input type="reset" value="Effacer" name="reset" />
</form>

