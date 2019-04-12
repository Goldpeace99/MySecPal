<?php

include("../system/server.php");
include("../system/functions.php");

$dir = basename(__DIR__); 

date_default_timezone_set('Europe/Sofia');
?>

<!DOCTYPE html>
<html>
    <?php include("../design/page_parts/head.php"); ?>

    <body>
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <div id="content">
                <div id="feedbackbox">
                    <div align="center">
  	                    <h2 class="rg"><?php langPrint("Отзиви", "Feedback"); ?></h2>
                        <form method="post" class="form">
                            <?php include("../system/errors.php"); ?>
                            <input type="hidden" name="author" value="<?php langPrint("Анонимно", "Anonymous"); ?>">
	                        <input type="hidden"  name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" >
                            <textarea name="comment"></textarea><br>
                            <button type="submit" name ="commentSubmit" class="fbtn"><?php langPrint("Коментирай", "Comment"); ?></button>
                        </form>
                    </div>
                </div>
                <?php pasteComments($db) ?>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
        </div>
    </body>
</html>
