
<h2><?php echo $_SESSION['fight']['ennemi']-> nom; ?></h2>
<div>
    <b>PV :</b><?php echo $_SESSION['fight']['ennemi']-> pv; ?>
</div>
<div>
    <b>Xp :</b><?php echo $_SESSION['fight']['ennemi']-> xp; ?>
</div>
<div>
    <b>Gold :</b><?php echo $_SESSION['fight']['ennemi']-> gold; ?>
</div>
<div>
    <b>Power :</b><?php echo $_SESSION['fight']['ennemi']-> puissance; ?>
</div>
<div>
    <b>Constitution :</b><?php echo $_SESSION['fight']['ennemi']-> constitution; ?>
</div>
<div>
    <b>Speed :</b><?php echo $_SESSION['fight']['ennemi']-> Vitesse; ?>
</div>
<div class="dialog-bubble">
    <b><?php
    require_once('./Classes/Goblin.php');
    require_once('./Classes/Dark_Knight.php');
    require_once('./Classes/Araignée.php');
    require_once('./Classes/Skeleton_knight.php');

    $ennemi = $_SESSION['fight']['ennemi'];

    if ($ennemi instanceof Goblin) {
        $ennemi->dialog_goblin();
    } else if ($ennemi instanceof  Dark_Knight) {
        $ennemi->dialogDarkKnight();
    } else if ($ennemi instanceof Skeleton_Knight) {
        $ennemi->dialogSkeletonKnight();
    } else if ($_SESSION['fight']['ennemi'] instanceof Araignée) {
        $ennemi->dialogSpider();
    }
?></b>
</div>
