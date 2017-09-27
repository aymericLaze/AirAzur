<h1>Confirmation de la reservation</h1>
<br/>
<br/>
<br/>
<form action="./index.php?action=ajoutReservation" method="POST">
    <fieldset>
        <legend><?php echo $idVols ?></legend>
        <br/>
        Nom : <?php echo $nom ?><input type="hidden" name="Nom" value="<?php echo $nom ?>"><br/>
        Prenom : <?php echo $prenom ?><input type="hidden" name="Prenom" value="<?php echo $prenom ?>"><br/>
        Adresse : <?php echo $adresse." ".$cp." ".$ville ?><input type="hidden" name="Adresse" value="<?php echo $adresse ?>"><input type="hidden" name="CP" value="<?php echo $cp ?>"><input type="hidden" name="Ville" value="<?php echo $ville ?>"><br/>
        Téléphone : <?php echo $tel ?><input type="hidden" name="Tel" value="<?php echo $tel ?>"><br/>
        Nombre de place réservé : <?php echo $placeRes ?><input type="hidden" name="PlaceRes" value="<?php echo $placeRes ?>"><br/>
        Prix : <?php echo $prixTotal ?>€<input type="hidden" name="PrixTotal" value="<?php echo $prixTotal ?>"><br/>
        <input type="hidden" name="idVols" value="<?php echo $idVols ?>"><br/>
        <input type="submit" value="Confirmer" name="envoyer" />
    </fieldset>
</form>