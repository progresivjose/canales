<?php
include 'php/conexion.class.php';
include 'php/sesion.php';
?>
<?php 
	if (isset($_REQUEST['buscar']) and $_REQUEST['buscar'] != "") {
    $nombre = $conexion->escape($_REQUEST['nombre']);
    $condicion = 'select nombre,imagen,idproducto from productos where nombre like \'%' . ($nombre) . '%\' ';
    $resultados = $conexion->ejecutarSQL($condicion);
    echo $condicion;
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
</head>
<body onload="fecha(), lista_productos(), menu_horizontal()">
<div id="header">
</div>

<!-- end #header -->
<div id="wrapper"> 
	<div id="menu">
<!--		<ul>
			<li class="current_page_item"><a href="#">Principal</a></li>
			<li><a href="#">Empresa</a></li>
			<li><a href="#">Forma de Pago</a></li>
			<li><a href="#">Contactos</a></li>
		</ul>-->
	</div>
	<!-- end #menu -->
    
    
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
		 
		 
		<?php 
   if(isset($resultados)){
   while($resultado = $conexion->fetchRow($resultados)){
   	?> <a href=ver_producto.php?id=<?php echo $resultado['idproducto']?>> <?php echo $resultado['nombre']; 
   	
   	?></a>
   	<img src="images/productos/<?php echo $resultado['imagen'] ?>" alt="imagen" style="width: 50px; height: 50px; "/>
   <?php } ?>
   <?php }?>
									
		<div style="clear: both;">&nbsp;</div>
	</div>
<form name="buscar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
  	<legend>Buscar</legend>
    <table class="table2">
    	<tr>
     	<td> 
      		<label>Nombre:</label>
       			<input name="nombre" type="text"  />
    </table>
   <input type="submit" name="buscar"/> 
</form>
   <!-- end #content -->
	<div id="sidebar">
    
    	 </div>
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
