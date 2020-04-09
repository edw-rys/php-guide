<?php
// Condicionamos en caso de que haya un error y luego imprimimos
if(isset($error)){
    echo '<p class="txt-center">'.$error.'</p>';
}
?>
<div class="flex-center flex">
    <section class="flex-y flex">
        <h2 class="txt-center">Iniciar sesión</h2>
        <form action="index.php?c=user&a=login" method="post" class="grid grid-gap-10">
            <input name="username" placeholder="Username">
            <input type="password" name="password" placeholder="password">
            <div class="grid">
                <input type="submit" value="login" class="btn-c edit">
            </div>
        </form>
    </section>
</div>