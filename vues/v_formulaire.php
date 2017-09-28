<?php
?>

<form action="./index.php?action=validationReservation&idVols=<?php echo $idVols ?>" method="POST">
    <!-- a faire récuperer -->
    Nom :<input type="text" name="nom" value="" /><br/>
    Prénom :<input type="text" name="prenom" value="" /><br/>
    Adresse :<input type="text" name="adresse" value="" /><br/>
    Code Postal :<input type="text" name="CP" value="" /><br/>
    Ville :<input type="text" name="ville" value="" /><br/>
    Téléphone :<input type="text" name="numTel" value="" /><br/>
    Nombre de place à reserver : <select name="placePrise">
                                        <?php
                                            $placeMax = $_SESSION["placeDisponible"];
                                            if ($placeMax>10){
                                                $placeAffiche=10;
                                            }
                                            else {
                                                $placeAffiche=$placeMax;
                                            }
                                            for($i=1; $i <= $placeAffiche; $i++){
                                        ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                </select><br />
    <input type="submit" value="Reserver" name="" />
    <input type="reset" value="Effacer" name="" />
</form>

