<<<<<<< HEAD

<?php 

    foreach($alertas as $key => $alerta ):
        foreach($alerta as $mensaje ):

?>
<div class="alerta <?php echo $key?>"> <?php echo $mensaje; ?></div>

<?php
        endforeach;
    endforeach;
=======
<?php 
foreach($alertas as $key =>$error):
    foreach($error as $mensaje):
?>
    <div class="alerta <?php echo $key; ?>">
        <?php echo $mensaje; ?>
    </div>
<?php 
    endforeach;
endforeach;
>>>>>>> 03661e7df9dd0f38d07402c45179539b96a931c0
?>