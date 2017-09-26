
<div id="catalogue">
    <table>
        <!-- modifier le format de l'heure et de la date -->
        <tr><th>Numéro de vol</th><th>Aéroport de départ</th><th>Aéroport d'arrivée</th><th>Date de départ</th><th>Date d'arrivée</th><th>Prix</th><th>Nombre de places Restantes</th><th>Réserver pour ce vol</th></tr>
        <!--<?php/*
            while($vol = $lesVols->fetch(PDO::FETCH_OBJ))
            {
                $numVol = $vol->idVols;
        */?>
        <tr>
            <td><?php// echo $numVol ?></td>
            <td><?php// echo $vol->aeroportDepart?></td>
            <td><?php// echo $vol->aeroportArrivee?></td>
            <td><?php// echo $vol->dateDepart?></td>
            <td><?php// echo $vol->dateArrivee?></td>
            <td><?php// echo $vol->prix ?></td>
            <td><?php// echo $vol->place?></td>
            <td><a href='index.php?action=formulaire&vol=<?php// echo $numVol ?>'>Réserver</a> </td>
        </tr>
        <?php/*
            }
        */?>-->
        <?php
            foreach($lesVols as $vol)
            {
                ?>
        <tr>
            <td><?php echo $vol["1"]["idVols"] ?></td>
            <td><?php echo $vol->aeroportDepart?></td>
            <td><?php echo $vol->aeroportArrivee?></td>
            <td><?php echo $vol->dateDepart?></td>
            <td><?php echo $vol->dateArrivee?></td>
            <td><?php echo $vol->prix ?></td>
            <td><?php echo $vol->place?></td>
            <td><a href='index.php?action=formulaire&vol=<?php echo $numVol ?>'>Réserver</a> </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>

