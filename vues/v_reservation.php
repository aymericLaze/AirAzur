<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="reservation">
    <table>
        <!-- Entete du tableau -->
        <tr><th>Numéro de reservation</th><th>Numéro de vol</th><th>Client</th><th>Adresse</th><th>Téléphone</th><th>Nombre de place</th><th>Prix</th><th>Générer PDF</th></tr>
        
        <!-- Affichage du tableau -->
        <?php
            //Parcours du tableau, contenant les vols, recupere
            foreach($reservations as $indice=>$res)
            {
        ?>
        
        <!-- Corps du tableau -->
        <tr>
            <td><?php echo $res["idReservation"] ?></td>
            <td><?php echo $res["idVols"] ?></td>
            <td><?php echo $res["nomClient"]." ".$res["prenomClient"] ?></td>
            <td><?php echo $res["adresseClient"]." ".$res["codePostalClient"]." ".$res["villeClient"] ?></td>
            <td><?php echo $res["telClient"] ?></td>
            <td><?php echo $res["nbPlaceReservee"] ?></td>
            <td><?php echo $res["prixTotal"]." €" ?></td>
            <td><form action="./index.php?action=creationPDF&id=<?php echo $res["idReservation"]?>" method="POST"><input type="image" src="./images/icon_pdf.png" style="width: 30px; height: 30px;padding-left: 0;" onclick="submit"/></input></form></td>
        </tr>
        
        
        <?php
            }
        ?>
        
    </table>
</div>
