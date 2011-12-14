<?php
if($user->id != 0 || empty ($user->id)){
?>
<form>
    <label for="user">Usuario</label>
    <input type="text" name="user" id="user" value=""/>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" value=""/>
</form>
<?php }else{
    echo "Bienvenido ".$user->nombre." ".$user->apellido;
}?>