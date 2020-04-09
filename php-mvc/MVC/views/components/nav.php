<nav class="nav-bar">
    <p class="logo">Logo</p>
    <span class="btn-menu flex flex-end">=</span>
    <ul class="no-list nav">
        <li><a href="index.php" class="flex-center active">Inicio</a></li>
        <li><a href="index.php?c=movie&a=index" class="flex-center">Peliculas</a></li>
        <?php
            if(isset($_SESSION["USER"])){
                $user=$_SESSION["USER"];
        ?>
            <li><a href="index.php?c=movie&a=show_new">Agregar</a></li>
            <li><a href="#"><?php echo $user->username;?></a></li>
            <li><a href="index.php?c=user&a=logout">Cerrar sesión</a></li>
        <?php
            }else{
        ?>
            <li><a href="index.php?c=user&a=view" class="flex-center">Iniciar Sesión</a></li>
        <?php }?>
    </ul>
</nav>