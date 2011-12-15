<ul>
    <li><h2>CATEGORIAS</h2><ul>
            <?php
            $categorias = $conexion->ejecutarSQL("select * from categorias");
            if ($conexion->numRows($categorias) > 0) {
                while ($categoria = $conexion->fetchRow($categorias)) {
                    ?>
                    <li><a href="<?php echo "productos.php?id=" . $categoria['idcategoria']; ?>"><?php echo $categoria['nombre'] ?></a></li>
                <?php }
            } else { ?>
                <li>No se disponen de categorias</li>
<?php } ?>
        </ul>
    </li>
</ul>