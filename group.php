<?php
/**
 * Created by PhpStorm.
 * User: sysadmin
 * Date: 2/10/2018
 * Time: 10:44 PM
 */

include_once('info.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hue_json = file_get_contents('http://'.$bridgeip.'/api/62FStlZDDwmQY98TtbiUtq655WjkZBDRXvfrynEo/lights/');
$hue_lights = json_decode($hue_json);



?>

<html>
<form action="group_submit.php" method="POST">

    <?php
    if(!empty($bridgeip)) {
        echo '<h3>Phillips Hue Accessories </h3>';
        echo'<hr>';
        echo '<label for="groupname">Group Name: </label>';
        echo '<input type="text" name="groupname" placeholder="Living Room Lights"><br>';

        foreach ($hue_lights as $key => $obj) {
            echo '<input name="hue[]" type="checkbox" value="'.$key.'"> '.$obj->name .'<br>';
        }
    }
    ?>
    <br>
    <button type="submit" class="btn btn-primary">Group Accessories</button>
</form>
<script>
    document.getElementById('modaltitle').innerText= "Group Accessories";
</script>
</html>
