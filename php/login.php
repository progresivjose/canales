<?php
if(!isset($session_id)){ 
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <label for="user">Usuario</label>
    <input type="text" value="" name="user" id="user"/>
    <label for="pass">Contrase&ntilde;a</label>
    <input type="password" value="" name="pass" id="pass"/>
    <input type="submit" value="Ingresar"/>
</form>
<?php }else{
    echo "Bienvenido " . $session_nombre . " ";
?>
<a href="<?php echo $_SERVER['PHP_SELF']?>?logout=1">Salir</a>
    <?php
}
?>