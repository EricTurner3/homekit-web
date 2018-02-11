<?php
/**
 * Created by PhpStorm.
 * User: sysadmin
 * Date: 2/10/2018
 * Time: 7:32 PM
 */

include_once('info.php');
include_once('_includes/header.inc.php');
?>


<body style="background:<?php echo $background ?>;  background-size: 400% 400%;">
<div class="main container animated fadeIn">
    <a href="index.php"><< Back to Home</a>
    <h1>Settings:</h1>
    <form class="animated shake" action="save_settings.php" method="post">
        <label for="background">Background:</label>
        <input name="background" value="<?php echo $background?>"> <br>

        <label for="homename">Home Name:</label>
        <input name="homename" value="<?php echo $homename?>"> <br>

        <label for="bridgeip">Phillips Hue Bridge IP:</label>
        <input name="bridgeip" value="<?php echo $bridgeip?>"> <br>

        <label for="bridgekey">Phillips Hue Bridge API Key:</label>
        <input name="bridgekey" value="<?php echo $bridgekey?>"> <br>



        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</body>
</html>

