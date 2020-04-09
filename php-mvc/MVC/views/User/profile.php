<?php
    if(!isset($_SESSION['USER']))header("Location:index.php");
?>
<div class="panel-profile">
    <div class="data-user">
        <div class="data grid grid-c-2"><span>Nombre de usuario: </span><span><?php echo $user->getUsername()?></span></div>
        <div class="data grid grid-c-2"><span>Nombres: </span><span><?php echo $user->getName_user()?></span></div>
        <div class="data grid grid-c-2"><span>Tipo de usuario: </span><span><?php echo $user->getname_TypeUser()?></span></div>
    </div>
    <div class="p">
        <?php include_once "views/components/panelMovies.php";?>
    </div>
</div>
