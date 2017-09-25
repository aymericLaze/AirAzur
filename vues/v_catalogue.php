
<div id="catalogue">
    <table>
        <!-- modifier le format de l'heure et de la date -->
        <tr><th>Numéro de vol</th><th>Aéroport de départ</th><th>Aéroport d'arrivée</th><th>Date de départ</th><th>Date d'arrivée</th><th>Prix</th><th>Nombre de places Restantes</th></tr>
        <?php
            while($vol = $lesVols->fetch(PDO::FETCH_OBJ))
            {
             echo "<tr><td>$vol->idVols</td><td>$vol->aeroportDepart</td><td>$vol->aeroportArrivee</td><td>$vol->dateDepart</td><td>$vol->dateArrivee</td><td>$vol->prix ?</td><td>$vol->place</td>";
            }
        ?>
    </table>
</div>

