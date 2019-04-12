<?php 

include("../system/server.php");
include("../system/functions.php");

$dir = basename(__DIR__); 

?>

<!DOCTYPE html>
<html>
    <?php include("../design/page_parts/head.php"); ?>

    <body>
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <div id="content">
                <div id="loginbox">
                    <div id="innerbox">
  	                    <h2 class="rg"><?php langPrint("Вход", "Log in"); ?></h2>
	                    <div align="center">
                            <form method="post">
                                <?php include("../system/errors.php"); ?>
  	                             <div class="rltext">
  		                            <label><?php langPrint("Потребителско име", "Username"); ?></label><br>
  		                            <input type="text" name="username" class="tb" >
  	                             </div>
  	                             <div class="rltext">
  		                            <label><?php langPrint("Парола", "password"); ?></label><br>
  		                            <input type="password" name="password" class="tb">
  	                             </div>
  	                             <div>
  		                            <button type="submit" class="rlbtn" name="login_user"><?php langPrint("Вход", "Log in"); ?></button>
                                </div>
  	                             <p>Не сте член? <a href="<?php echo(rel_path("register/index.php", $dir)) ?>"><?php langPrint("Регистрирайте се", "Sign up"); ?></a></p>
  	                             <?php // <p><?php langPrint("Забравили сте си паролата?", "Forgot your password?");  <a href="<?php echo(rel_path("/forgotten_password/index.php", $dir)) "><?php langPrint("Сменете я", "Change it"); </a></p> ?>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
        </div>
    </body>
</html>