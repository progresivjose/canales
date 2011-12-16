<?php
include 'php/conexion.class.php';
include 'php/sesion.php';

if(isset($_GET['ventaid'])){
    $ventaid = $_GET['ventaid'];
    $venta_sql = $conexion->fetchRow($conexion->ejecutarSQL("select * from ventas where idventa = '$ventaid'"));
    }
?>
<html>
    <head>
        <title>comprobante</title>
        <style>
            #carrito{
                width: 100%;
                text-align: center;
            }

            #carrito thead{
                background-color: #f8f8f8;
            }

            #carrito tfoot{
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <?php if(isset($venta)){?>
        <table id="carrito">
            <thead>
                <tr>
                    <th colspan="4">Comprobante de Compra</th>
                </tr>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $id_productos = implode(',', $venta->get_productos());
                $productos = $conexion->ejecutarSQL("select * from productos where idproducto in ({$id_productos})");
                while ($producto = $conexion->fetchRow($productos)) {
                    ?>
                    <tr>
                        <td><?php echo $producto['nombre'] ?></td>
                        <td><?php echo $venta->get_cantidad($producto['idproducto']) ?></td>
                        <td><?php echo number_format($producto['precio'], 0, ',', '.') ?></td>
                        <td><?php echo number_format($producto['precio'] * $venta->get_cantidad($producto['idproducto']), 0, ',', '.') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right">Total a Pagar</td>
                    <td><?php echo number_format($venta->calcular_monto(), 0, ',', '.'); ?></td>
                </tr>
            </tfoot>
        </table>
       <?php }else{?>
        <h1>Ya fue realizada esta compra</h1>
        <?php }?>
    </body>
</html>

<?php        
unset($venta);
unset($_SESSION["venta"]);
?>