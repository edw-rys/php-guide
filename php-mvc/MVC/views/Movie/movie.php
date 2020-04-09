<div class="movies">
    <div class="panel">
        <!-- Incluimos código php para hacer el ciclo -->
        <?php foreach ($peliculas as $key => $pelicula) {
            $url_img =  ROUTEAPP."/" .$pelicula->url_img;
        ?>
            <div class="card">
                <div class="picture"><img src="<?php echo  $url_img?>" alt=""></div>
                <div class="body">
                    <p>Nombre: <?php echo $pelicula->name_movie ?> </p>
                    <p>Sipnosis: <?php echo $pelicula->sipnosis ?> </p>
                    <p>Género: <?php echo $pelicula->name_ctg ?> </p>
                </div>
                <?php
                if(isset($_SESSION['USER'])){
                    ?>
                <div class="actions flex flex-center flex-y w-100-p">
                    <a class="btn-c edit" href="index.php?c=movie&a=show_edit&id=<?php echo $pelicula->id_movie ?>">Edit</a>
                    <a class="btn-c remove" href="index.php?c=movie&a=delete&id=<?php echo $pelicula->id_movie ?>">Eliminar</a>
                </div>
                <?php
                }
                ?>
            </div>
        <?php
        }?> 
    </div>
</div>