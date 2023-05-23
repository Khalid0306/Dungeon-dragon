<h3><?php echo $equipement->nom_eqp; ?></h3>
<div>
    <img class="eqipement-img" src="<?php echo $equipement->picture; ?>" alt="Image de l'equipement">
</div>
<div>
    <b>required level :</b><?php echo $equipement->level_requis; ?>
</div>
<div>
    <b>required class :</b><?php echo implode(', ', $equipement->classe_requises); ?>
</div>
<div>
    <b>Required stats :</b>
    <?php foreach ($equipement->stat_requises as $key => $value) {
        echo $key . ': ' . $value . ', ';
    } ?>
</div>
<div>
    <b>Durability :</b><?php echo $equipement->Durabilité; ?>
</div>
<div>
    <b>Stat bonus :</b>
    <?php foreach ($equipement->Bonus_stat as $key => $value) {
        echo $key . ': ' . $value . ', ';
    } ?>
</div>
<div>
    <b>Price :</b><?php echo $equipement->prix_eqp; ?>
</div>
<div>
    
    <?php require_once('Buy_gear.php'); ?>
    <form action="Buy_gear.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $persoId; ?>">
        <input type="submit" value="Buy" name="Buy" class="btn btn-green" onClick="return confirm('Confirmez vous votre choix ?')">
    </form>
</div>
<br>