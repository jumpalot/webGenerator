    <legend><h1>Bienvenido a tu panel</h1></legend>
    <form action="." method="get">
        <input type="submit" name="logout" value="Cerrar sesión de <?=$usu?>"/>
    </form>
    <form action="." method="post">
        <h2>Generar web de:</h2><br>
        <input type="text" name="web" pattern="[A-Za-z]{1,15}" require><br><br>
        <input type="submit" value="Crear Web">
    </form>
</fieldset>
<fieldset>
    <legend><h2>Mis Webs</h2></legend>
    <?php foreach (misWebs($usu) as $weba): $web=$weba[0]; ?>
        <h4>
            <a href="./users/<?=$web?>"><?=$web?></a>
            <a href="./?descargar=<?=$web?>">descargar web</a>
        </h4>
    <?php endforeach;?>