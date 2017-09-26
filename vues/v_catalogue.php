
<div id="catalogue">
    <!-- Catalogue des vols disponible -->
    <table>
        <!-- Entete du tableau -->
        <tr><th>Num�ro de vol</th><th>A�roport de d�part</th><th>A�roport d'arriv�e</th><th>Date de d�part</th><th>Date d'arriv�e</th><th>Prix</th><th>Nombre de places Restantes</th><th>R�server pour ce vol</th></tr>
        
        <!-- Affichage du tableau -->
        <?php
            //Parcours du tableau, contenant les vols, recupere
            foreach($lesVols as $indice=>$vol)
            {
        ?>
        
        <!-- Corps du tableau -->
        <tr>
            <td><?php echo $vol["idVol"] ?></td>
            <td><?php echo $vol["aeroportDepart"] ?></td>
            <td><?php echo $vol["aeroportArrivee"] ?></td>
            <td><?php echo $vol["dateDepart"] ?></td>
            <td><?php echo $vol["dateArrivee"] ?></td>
            <td><?php echo $vol["prix"]." ?" ?></td>
            <td><?php echo $vol["place"] ?></td>
            <td><a href='index.php?action=formulaire&vol=<?php echo $vol["idVol"] ?>'>R�server</a> </td>
        </tr>
        
        <?php
            }
        ?>
        
    </table>
</div>

