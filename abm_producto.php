<?php
include 'php/conexion.class.php';
include 'php/sesion.php';
if(!isset($user)){
    header('Location: index.php');
}else{
    $tipo = $user->get_tipo();
    if($tipo==1){
        header('Location: index.php');
    }
}

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];

    if ($tipo == "new") {
        $conexion->ejecutarSQL("insert into productos (nombre, precio, cantidad, id_categoria, descripcion) values ('$nombre', '$precio', '$cantidad', '$categoria', '$descripcion')");
        $productoid = $conexion->fetchRow($conexion->ejecutarSQL("select max(idproducto) as idproducto from productos"));
        $id = $productoid['idproducto'];
    } elseif ($tipo == 'edit') {
        $id = $_POST['productoid'];
        $sql = "update productos set
                    nombre = '$nombre', precio='$precio', cantidad='$cantidad', id_categoria = '$categoria', descripcion = '$descripcion'
                    where idproducto = '$id'";
        $conexion->ejecutarSQL($sql);
    }
    
    $imagen = $_FILES['imagen']['name'];
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], 'images/productos/' . $imagen)) {
        $conexion->ejecutarSQL("update productos set imagen = '$imagen' where idproducto = " . $id);
    }
    header('Location: abm_producto.php');
}

if (isset($_GET['edit'])) {
    $producto = $conexion->fetchRow($conexion->ejecutarSQL("select * from productos where idproducto = " . $_GET['edit']));
}

if (isset($_GET['del'])) {
    $ventas_det = $conexion->ejecutarSQL("select * from ventas_det where cod_producto = " . $_GET['del']);
    if($conexion->numRows($ventas_det)>0){
        $error = "No se puede Eliminar";
    }else{
        $conexion->ejecutarSQL("delete from productos where idproducto = " . $_GET['del']);
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>CANALES S.A.</title>
        <link rel="stylesheet" href="css/jquery.lightbox-0.5.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css" type="text/css"   />
        <script type="text/javascript" src="js/jquery-1.6.1.js"></script>
        <script type="text/javascript" src="js/corner.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
        <script type="text/javascript"  src="js/funciones.js"></script>
        <script type="text/javascript" src="js/contador.js"></script>
        <script type="text/javascript">
<?php if (isset($_GET['msg']) and $_GET['msg'] == 1) { ?>
        alert('Para realizar una compra debe iniciar sesion');
<?php } ?>    
        </script>
    </head>
    <body onload="fecha(), lista_productos(), menu_horizontal()">
        <div id="header">
        </div>

        <!-- end #header -->
        <div id="wrapper"> 
            <div id="menu"><?php include "php/menu.php" ?></div>
            <!-- end #menu -->
            <div id="login">
                <?php include "php/login.php"; ?>
            </div>

            <!--  NO SE USA 
             <div id="search" >
                           <form method="get" action="#">
                                   <div>
                                           <input type="text" name="s" id="search-text" value="" />
                                   </div>
                           </form>
             </div>-->
        </div>
        <div id="page">

            <div id="fecha">Fecha actual</div>

            <div id="content">
                <div class="error"><?php if(isset($error)){echo $error;}?></div>
                <fieldset>
                    <legend>Formulario</legend>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label for="nombre">Nombre</label></td>
                                <td><input type="text" name="nombre" id="nombre" value="<?php if (isset($producto)) {
                    echo $producto['nombre'];
                } ?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="precio">Precio</label></td>
                                <td><input type="text" name="precio" id="precio" value="<?php if (isset($producto)) {
                    echo $producto['precio'];
                } ?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="cantidad">Cantidad</label></td>
                                <td><input type="text" name="cantidad" id="cantidad" value="<?php if (isset($producto)) {
                    echo $producto['cantidad'];
                } ?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="categoria">Categoria</label></td>
                                <td>
                                    <select name="categoria" id="categoria">
                                        <option value="">Elegir...</option>
<?php
$categorias = $conexion->ejecutarSQL("select * from categorias");
while ($categoria = $conexion->fetchRow($categorias)) {
    ?>
                                            <option value="<?php echo $categoria['idcategoria'] ?>"><?php echo $categoria['nombre'] ?></option>
<?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="imagen">Imagen</label></td>
                                <td><input type="file" name="imagen" id="imagen" /></td>
                            </tr>
                            <tr>
                                <td><label for="descripcion">Descripcion</label></td>
                                <td><textarea name="descripcion" id="descripcion" ><?php if (isset($producto)) {
    echo $producto['descripcion'];
} ?></textarea></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" value="Guardar"/></td>
                            </tr>

                        </table>
                        <input type="hidden" name="tipo" value="<?php if (isset($producto)) {
    echo "edit";
} else {
    echo "new";
} ?>" />
                        <?php if(isset($producto)){?>
                        <input type="hidden" name="productoid" value="<?php echo $producto['idproducto']?>"/>
                        <?php }?>
                    </form>
                </fieldset>
                <div id="listado">
                    <fieldset>
                        <legend>Listado de productos</legend>
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $productos = $conexion->ejecutarSQL("select * from productos");
                                while ($producto = $conexion->fetchRow($productos)) { ?>
                                    <tr>
                                        <td><img src="images/productos/<?php echo $producto['imagen'] ?>" alt="imagen" style="width: 50px; height: 50px;"/></td>
                                        <td><?php echo $producto['nombre'] ?></td>
                                        <td><?php echo $producto['cantidad'] ?></td>
                                        <td><?php echo $producto['id_categoria'] ?></td>
                                        <td><?php echo number_format($producto['precio'], 0, ',', '.') ?></td>
                                        <td>
                                            <a href="abm_producto.php?edit=<?php echo $producto['idproducto'] ?>">Editar</a>
                                            <a href="abm_producto.php?del=<?php echo $producto['idproducto'] ?>">Eliminar</a>
                                        </td>
                                    </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>

            <!-- end #content -->
            <div id="sidebar"><?php include "php/sidebar.php"; ?></div>
            <!-- end #sidebar -->
            <div style="clear: both;">&nbsp;</div>
        </div>

        <!-- end #page -->
        <div id="footer-menu">
            <!--	<ul>
                            <li class="current_page_item"><a href="#">Principal</a></li>
                                    <li><a href="#">Empresa</a></li>
                                    <li><a href="#">Forma de Pago</a></li>
                                    <li><a href="#">Contactos</a></li>
                    </ul>--> 
        </div>
        <div id="footer">
            <p>España 904 esq TTe Benitez Telefax:585-489/ 591 -585 ventas@canales.com.py</p>
        </div>
        <!-- end #footer -->
    </body>
</html>
