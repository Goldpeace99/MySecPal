<div id="header">
                <?php
                    error_reporting(E_ERROR | E_PARSE);
                    session_start(); 
                ?>
                <div id="upper">
                    <div id="langbar">
                        <div id="bg" align="center">
                            <a href="<?php if($dir != "user") { echo ("index?lang=bg"); } else { echo ("index?user=" . base64_encode($_SESSION['username']) . "&lang=bg"); } ?>">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Bulgaria.svg" width="35" height="21">
                            <a href="<?php if($dir != "user") { echo ("index?lang=en"); } else { echo ("index?user=" . base64_encode($_SESSION['username']) . "&lang=en"); } ?>">
                                <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg" width="35" height="21">
                            </a>
                        </div>
                    </div>
                    <div id="logo">
                        <a href="<?php echo rel_path(langRet("index", "index?lang=en"), $dir); ?>">
                            <img src="<?php echo rel_path("design/images/logo_menu.png", $dir); ?>" alt="Грешка при зареждането" />
                        </a>
                    </div>
                    <div id ="logregist">
                        <?php
                            //error_reporting(E_ERROR | E_PARSE);
                            //session_start();
                            
                            if($_SESSION['success'] == true && isset($_SESSION['username']))
                            {
                                $prof_link = "user/index?user=" . base64_encode($_SESSION['username']);
                                echo ('<a href="' . rel_path_inclusion(langRet($prof_link, $prof_link . '&lang=en') , $dir) . '">' . $_SESSION['username'] . '</a>');
                            }
                            else
                            {
                                echo ('<a href="' . rel_path_inclusion(langRet("login/index", "login/index?lang=en"), $dir) .'"><div id="login"><img src="' . rel_path_inclusion("design/images/login.jpg", $dir) . '" alt="Грешка при зареждането" />'. langRet("Вход", "Log in") .'</div></a><a href="' . rel_path_inclusion(langRet("register/index", "register/index?lang=en"), $dir) . '"><div id="registrate"><img src="' . rel_path_inclusion("design/images/register.jpg", $dir) . '" alt="Грешка при зареждането" />' . langRet("Регистрация", "Register") . '</div></a>');
                            }
                        ?>
                    </div>
                </div>
                <div id="bar">
                    <a class="burger-menu">
                        <img src="<?php echo rel_path("design/images/burger.png" , $dir); ?>" width="27" height="27" alt="<?php langPrint("Грешка при зареждането", "Error in loading"); ?>" />
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo rel_path(langRet("pannel_checker/index", "pannel_checker/index?lang=en"), $dir); ?>">
                                <img src="<?php echo rel_path(langRet(img_active("webscan", $dir, "pannel_checker"), img_active("webscan_en", $dir, "pannel_checker")), $dir); ?>" alt="<?php langPrint("Грешка при зареждането", "Error in loading"); ?>" />
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo rel_path(langRet("tcp/index", "tcp/index?lang=en"), $dir); ?>">
                                <img src="<?php echo rel_path(langRet(img_active("computer", $dir, "tcp"), img_active("computer_en", $dir, "tcp")), $dir); ?>" alt="<?php langPrint("Грешка при зареждането", "Error in loading"); ?>" />
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo rel_path(langRet("network/index", "network/index?lang=en"), $dir); ?>">
                                <img src="<?php echo rel_path(langRet(img_active("tcpnet", $dir, "network"), img_active("tcpnet_en", $dir, "network")), $dir); ?>" alt="<?php langPrint("Грешка при зареждането", "Error in loading"); ?>" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>