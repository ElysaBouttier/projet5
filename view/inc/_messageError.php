<!-- Error message (red) -->
<?php
if (isset($GLOBALS['alert']) && !empty($GLOBALS['alert']))
{
    ?>
    <div class="alert alert-danger" role="alert">
        <p>
            <?php
            $message = $GLOBALS['alert'];
            echo $message['alertMessage'];
            ?>
        </p>
    </div>
    <?php
}
?>

<!-- Success message (green) -->
<?php
if (isset($GLOBALS['success']) && !empty($GLOBALS['success']))
{
?>
    <div class="alert alert-success" role="alert">
        <p>
            <?php
            $message = $GLOBALS['success'];
            echo $message['successMessage'];
            ?>
        </p>
    </div>
<?php
}
?>