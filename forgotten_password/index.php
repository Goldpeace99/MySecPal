<?php 

include("../system/server.php");
include("../system/functions.php");

$dir = basename(__DIR__); 

?>

<!DOCTYPE html>
<html lang="bg">
    <?php include("../design/page_parts/head.php"); ?>

    <body>
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <div id="content">
                <div id="loginbox">
                    <div id="innerbox">
  	                    <h2 class="rg">Вход</h2>
	                    <div align="center">
                            <form method="post">
                                <?php include("../system/errors.php"); ?>
                                <div class="rltext">
  		                            <label>Потребителско име</label><br>
  		                            <input type="text" name="username" class="tb" >
  	                             </div>
  	                             <div>
  		                            <button type="submit" class="rlbtn" name="change_passwd">Пращане на парола</button>
                                </div>
  	                             <a href="<?php echo(rel_path("login/index.php", $dir)) ?>">Сещате се за паролата си?</a>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
        </div>
    </body>
</html>