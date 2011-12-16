<ul>
    <li><a href='index.php'>Principal</a></li>
    <li><a href='empresa.html'>Empresa</a></li>
    <li><a href='forma_pago.html'>Forma de Pago</a></li>
    <li><a href='contactos.html'>Contactos</a></li>
    <?php
    if (isset($user)) {
        ?>
    <li><a href='perfil.php'>Perfil</a></li>
        <?php
    }
    ?>
</ul>
