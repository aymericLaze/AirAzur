<br/>
<br/>

<?php
if($action != "accueil"){
    if ($action != "ajoutReservation" ) {
    
    ?>
    <form>
        <input type="button" value="Page précédente" onclick="history.go(-1)">
    </form>
<?php 

}
?>
<form action="./index.php">
    <input type="submit" value="Accueil" />
</form>
<?php
}
?>
</div>
</body>
</html>
