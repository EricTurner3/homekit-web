
<?php

include_once('info.php');
include_once('_includes/header.inc.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<body style="background:<?php echo $background ?>;  background-size: 400% 400%;">
<div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>

        </div>
    </div>
</div>

<script>

    $('.modal').on('show.bs.modal', function (e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  zoomIn  animated');
    })
    $('.modal').on('hide.bs.modal', function (e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  zoomOut  animated');
    })

    function loadHueEditModal(modal){

            $('.modal-body').load('/hue_edit.php?id='+modal,function(result){

                $('#modal').modal({show:true});
            });
    }
    function loadGroupModal(){

        $('.modal').on('show.bs.modal', function (e) {
            $('.item').attr('class', 'item animated tada infinite');
        })
        $('.modal').on('hide.bs.modal', function (e) {
            $('.item').attr('class', 'item animated bounceIn');
        })


        $('.modal-body').load('/group.php',function(result){

            $('#modal').modal({show:true});
        });
    }

</script>

<div class="main container animated fadeIn">
    <a id="settings" href="settings.php" ><i class="icon ion-gear-a"></i> Settings</a>
    <h1><?php echo $homename ?></h1>
    <hr>
    <div class="clearfix" style="padding-bottom: 20px">
        <button type="button" class="btn-sm btn-primary" onclick="loadGroupModal()" style="float:right">Edit Accessories</button>
    </div>
    <div class="row">

    <?php
    //Get Phillips Hue Lights from URL if Bridge IP is specified
    if(!empty($bridgeip) AND !empty($bridgekey)){
    $hue_json = file_get_contents('http://'.$bridgeip.'/api/'.$bridgekey.'/groups');
    $hue_objects = json_decode($hue_json);

    $row_objects = 0;

    foreach($hue_objects as $key => $obj) {
        echo '<div class="col-sm-2 center-align">';
        echo '<div id="hue_' . $key . '" class= "item animated bounceIn" onclick="loadHueEditModal(\'' . $key . '\')">';
        if ($obj->action->on == true) {
            echo '<i class="icon bulb active ion-ios-lightbulb"></i><br>';
        } else {
            echo '<i class="icon bulb ion-ios-lightbulb-outline"></i><br>';
        }

        echo '<p class="name">' . $obj->name . '</p>';
        $brightness = number_format($obj->action->bri / 254 * 100, 0);
        echo '<p class="brightness">' . $brightness . '%</p>';
        echo '</div>';
        echo '</div>';
        if ($row_objects <= 2) {
            echo '<div class="col-sm-1"></div>';
        }
        if ($row_objects == 3) {
            echo '</div>';
            echo '<br>';
            echo '<div class="row">';
            $row_objects = 0;
        }


        #Generate a click function for each one for the model content

        /*
        echo "<script>";
            echo "$('#hue_".$hue_id."').click(function(){";
                echo "$('.modal-body').load('/hue_edit.php?id=".$hue_id."',function(result){";
                    echo "$('#hue_edit').modal({show:true});";
                 echo "});";
            echo "});";
        echo " </script>";
        */
        $row_objects++;
    }
    }
    ?>
    </div>



</div>
</body>
</html>