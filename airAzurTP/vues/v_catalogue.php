
<div id="catalogue">
    <!-- Catalogue des vols disponible -->
    <table>
        <!-- Entete du tableau -->
        <tr><th>Numéro de vol</th><th>Aéroport de départ</th><th>Aéroport d'arrivée</th><th>Date de départ</th><th>Date d'arrivée</th><th>Prix</th><th>Nombre de places Restantes</th><th>Réserver pour ce vol</th></tr>
        
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
            <td><?php echo $vol["prix"]." €" ?></td>
            <td><?php echo $vol["placeDisponible"] ?></td>
            <td><a href='index.php?action=formulaire&vol=<?php echo $vol["idVol"] ?>'><button>Réserver</button></a> </td>
        </tr>
        
        <?php
            }
        ?>
        
    </table>
</div>

