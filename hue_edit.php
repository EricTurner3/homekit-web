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

$id = $_GET['id'];

$hue_json = file_get_contents('http://'.$bridgeip.'/api/'.$bridgekey.'/groups/'.$id);
$hue_light = json_decode($hue_json);

$name = $hue_light->name;
$power =  $hue_light->action->on;
$brightness = number_format($hue_light->action->bri/254 * 100,0);

?>

<html>
<form action="hue_submit.php" method="POST">
    <input type="text" name="light_id" value="<?php echo $id ?>" style="display:none">
    <label for="switch">Power</label> <br>
    <table class="toggle">
        <tr>
    <td><label for="switch">Off</label></td>
    <td>
    <?php
    if($power == true){
        echo' <label class="switch">
        <input name="power" type="checkbox" checked>
        <span class="slider round"></span>
    </label> ';
    }
    else{
        echo' <label class="switch">
        <input name="power" type="checkbox">
        <span class="slider round"></span>
    </label> ';
    }

    ?>

    </td>
    <td><label for="switch">On</label> <br></td></tr>

    </table>
    <label for="rangeInput">Brightness</label>
    <input type="range" id="bright" min="0" value="<?php echo $brightness ?>" max="100" onchange="updateTextInput(this.value);">
    <input type="text" id="brightness" name="brightness" value="<?php echo $brightness ?>">

    <button type="submit" class="btn btn-primary">Update</button>
</form>
<script>
    document.getElementById('modaltitle').innerText= "<?php echo $name ?>";
    function updateTextInput(val) {
        document.getElementById('brightness').value=val;
    }
</script>
</html>
