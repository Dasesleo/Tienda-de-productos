<?php
session_start();

  
if(isset($_GET["idioma"])) {    
    if($_GET["idioma"]=="es") {
        setcookie("c_idioma","es",time()+(60*60*24));
    }else {
        setcookie("c_idioma","en",time()+(60*60*24));
    }
}

if(isset($_POST["nombre"]) && isset($_POST["clave"])) {
    $_SESSION["s_nombre"] = $_POST["nombre"];
    $_SESSION["s_clave"] = $_POST["clave"];
}

if(!isset($_SESSION["s_nombre"]) && !isset($_SESSION["s_clave"])) {
    header("Location: index.php");
}

$nombre = $_SESSION["s_nombre"];
$clave = $_SESSION["s_clave"];

$guardarPreferencias = (isset($_POST["chkpreferencias"]))?$_POST["chkpreferencias"]:"";

if($guardarPreferencias != "") {
    setcookie("c_nombre", $nombre, 0);
    setcookie("c_clave", $clave, 0);
    setcookie("c_preferencias", $guardarPreferencias, 0);
}else {

}

$lectura_es = fopen('categorias_es.txt', 'r') or die ("Error al intentar leer el archivo");
$lectura_en = fopen('categorias_en.txt', 'r') or die ("Error al intentar leer el archivo");
?>

<HTML>
    <head></head>
    <body>
    <h1>Pantalla: Panel Principal</h1>
    <fieldset>
        <h1>PANEL PRINCIPAL</h1>
        <h1>Bienvenido: <?php echo $nombre; ?></h1>
        <a href="mipanel.php?idioma=es">ES (Español)</a>
        <a href="mipanel.php?idioma=en">!EN (English)</a>
        <br>
        <br>
        <a href="cerrarsesion.php">Cerrar Sesion</a>
        <br>
        <br>
        <h2><?php
           
                if($_COOKIE["c_idioma"]=="es") {
                    echo "Lista de productos<br>";
                }else{
                echo "Product List<br>";
                }
          
        ?></h2>

        <?php
        if(isset($_COOKIE["c_idioma"]) && $_COOKIE["c_idioma"]=="es"){
            while(!feof($lectura_es)){
                $obtener = fgets($lectura_es);
                $filas = nl2br($obtener);
                echo "$filas";
            }
            fclose($lectura_en);
        }elseif(isset($_COOKIE["c_idioma"]) && $_COOKIE["c_idioma"]=="en"){
            while(!feof($lectura_en)){
                $obtener = fgets($lectura_en);
                $filas = nl2br($obtener);
                echo "$filas";
            }
            fclose($lectura_en);
        }
        elseif(!isset($_COOKIE["c_idioma"])){
            while(!feof($lectura_es)){
                $obtener = fgets($lectura_es);
                $filas = nl2br($obtener);
                echo "$filas";
            }
            fclose($lectura_es);
        }
        ?>
    </fieldset>    
    </body>
</HTML>