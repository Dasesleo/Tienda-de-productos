<?php
session_start();
$preferencias = false;
$nombre="";
$clave="";

if(isset($_COOKIE["c_preferencias"]) && $_COOKIE["c_preferencias"]!="") {
    $preferencias = true;
    $nombre = isset($_COOKIE["c_nombre"])?$_COOKIE["c_nombre"] : "";
    $clave = isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"] : "";
}
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Pantalla: Login </h1>
        <form method = "POST" action="mipanel.php">
            <fieldset>
                <h1>LOGIN</h1>
                Usuario: <br>
                <input type="text" name="nombre" value="<?php echo $nombre; ?>"/><br>
                Clave:<br>
                <input type="password" name="clave" value="<?php echo $clave; ?>"/><br>
                <br>
                <input type="checkbox" name="chkpreferencias" <?php echo ($preferencias)?"checked": ""; ?>> Recordarme
                <br>
                <br>
                <input type="submit" value="Enviar"> 
            </fieldset>    
        </form>
    </body>
</html>
