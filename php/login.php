<?php
if($user->id != 0 || empty ($user->id)){
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <label for="user">Usuario</label>
    <input type="text" name="user" id="user" value=""/>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" value=""/>
    <input type="submit" value="Login"/>
</form>
<?php }else{
    echo "Bienvenido ".$user->nombre." ".$user->apellido;
}?>