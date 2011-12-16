<?php
include 'php/conexion.class.php';
include 'php/sesion.php';

if (isset($_GET['ventaid'])) {
    $ventaid = $_GET['ventaid'];
    $venta_sql = $conexion->fetchRow($conexion->ejecutarSQL("select * from ventas_cab where idventa = '$ventaid'"));
    $venta2 = new Venta($user->get_id(), date('Y-m-d'));
    $venta2->set_id($ventaid);
    $venta2->set_monto_total($venta_sql['total_venta']);
    $sql = "select * from ventas_det where cod_venta = '$ventaid'";
    $detalles = $conexion->ejecutarSQL($sql);
    while ($detalle = $conexion->fetchRow($detalles)) {
        $venta2->agregar_producto($detalle['cod_producto'], $detalle['cantidad']);
    }
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
                    $id_productos = implode(',', $venta2->get_productos());
                    $sql = "select * from productos where idproducto in ({$id_productos})";
                    $productos = $conexion->ejecutarSQL($sql);
                    while ($producto = $conexion->fetchRow($productos)) {
                       ?>
                        <tr>
                            <td><?php echo $producto['nombre'] ?></td>
                            <td><?php echo $venta2->get_cantidad($producto['idproducto']) ?></td>
                            <td><?php echo number_format($producto['precio'], 0, ',', '.') ?></td>
                            <td><?php echo number_format($producto['precio'] * $venta2->get_cantidad($producto['idproducto']), 0, ',', '.') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right">Total a Pagar</td>
                        <td><?php echo number_format($venta2->get_monto_total(), 0, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
    </body>
</html>

<?php
unset($venta2);
?>