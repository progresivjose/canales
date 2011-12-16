<?php
if(!isset($user)){ 
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <table>
        <tr>
    <td><label for="user">Usuario</label></td>
    <td><input type="text" value="" name="user" id="user" class="input"/></td>
    <td><input type="submit" value="Ok"/></td>
    </tr>
    <tr>
    <td><label for="pass">Contrase&ntilde;a</label></td>
    <td><input type="password" value="" name="pass" id="pass" class="input"/></td>
    </tr>

    </table>
</form>
<?php }else{
    echo "Bienvenido " . $user->get_nombre() . " " . $user->get_apellido() . " ";
?>
<a href="<?php echo $_SERVER['PHP_SELF']?>?logout=1">Salir</a>
    <?php
}
?>