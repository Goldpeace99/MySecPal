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
                <div id="registerbox">
                    <div id="innerbox">
  	                    <h2 class="rg"><?php langPrint("Регистрация", "Register"); ?></h2>
	                    <div align="center">
                            <form method="post">
  	                             <?php include('../system/errors.php'); ?>
  	                             <div class="rltext">
  	                                 <label><?php langPrint("Потребителско име:", "Username"); ?></label><br>
  	                                 <input type="text" name="username" value="<?php echo(h_char($username)); ?>" class="tb">
  	                             </div>
  	                             <div class="rltext">
  	                                 <label><?php langPrint("Е-поща:", "E-mail"); ?></label><br>
  	                                 <input type="email" name="email" value="<?php echo(h_char($email)); ?>" class="tb">
                                </div>
  	                             <div class="rltext">
  	                                 <label><?php langPrint("Парола", "password"); ?></label><br>
  	                                 <input type="password" name="password_1" class="tb">
  	                             </div>
  	                             <div class="rltext">
  	                                 <label><?php langPrint("Потвърждаване на парола:", "Confirm password"); ?></label><br>
  	                                 <input type="password" name="password_2" class="tb">
  	                             </div>
  	                             <div class="rltext">
  	                                 <button type="submit" class="rlbtn" name="reg_user"><?php langPrint("Регистрация", "Registrate"); ?></button>
  	                             </div>
  	                             <p>
  		                            <?php langPrint("Имате акаунт?", "Already registered?");?> <a href="<?php echo(rel_path("login/index.php", $dir)) ?>"><?php langPrint("Вход", "Log in"); ?></a>
  	                             </p>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
            
        </div>
    </body>
</html>