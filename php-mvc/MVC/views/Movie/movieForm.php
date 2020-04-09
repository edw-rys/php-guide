<div class="flex flex-center">
    <div class="container" style="width:50%">
        <form action="index.php?c=movie&a=save" method="post" enctype="multipart/form-data" class="flex flex-y">
            <?php if(isset($pelicula) ){    ?>
                <input type="hidden" name="id_movie" value="<?php echo isset($pelicula)?$pelicula->id_movie:''?>">
            <?php }
            ?>
            <input 
                type="text" 
                name="name" 
                class="input"
                value="<?php echo isset($pelicula)?$pelicula->name_movie:''?>"
                placeholder="Nombre de la película"
            >
            <textarea 
                class="input"
                name="sipnosis" 
                placeholder="Text"><?php echo isset($pelicula)?$pelicula->sipnosis:''?></textarea>

            <input 
                type="file" 
                name="img"
            >

            <select 
                name="ctg"
                class="input"
            >
                <?php
                    foreach($categories as $ctg){
                        ?>
                        
                        <option 
                            value="<?php echo $ctg->id_ctg?>" 
                            <?php 
                                if(isset($pelicula)){
                                    if($ctg->id_ctg==$pelicula->id_ctg)
                                        echo "selected";
                                }
                            ?>
                        >
                            <?php echo $ctg->name_ctg?>
                        </option>
                        <?php
                    }
                ?>
            </select>
            <input 
                class="btn-c edit"
                type="submit" 
                value="<?php echo $pageName;?>"
            >                
        </form>
    </div>
</div>