<?php

include("system/functions.php");

$dir = basename(__DIR__); 

?>

<!doctype html>

<html lang="<?php echo $lang['lang']; ?>">
    <?php include("design/page_parts/head.php"); ?>
    
    <body>
        <!-- Opakovka na stranicata -->
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <!-- Sydyrjanie -->
            <div id="content" style="height: 1200px;">
                <!-- Hexagon s text -->
                <div  id="flapp" class="ltab">
                    <div class="hex">
                        <div class="top"></div>
                        <div class="middle">
                            <img src="<?php echo(rel_path_inclusion("design/images/urlsearch.jpg", $dir)); ?>" alt="Грешка при зареждането" />
                        </div>
                            <div class="text" id="text">
                                <?php langPrint("Нашият сайт предлага редица услуги, една от които е търсенето на скрити линкове. <br>Тази услуга е предназначена да пусне паяк, при въведен определен линк. <br>При пускането на паяка се търсят определени линкове асоциирани с важни за сайта точки. <br>След това тази услуга връща дали съществуват търсените линкове. <br> Изпълнението на това може да отнеме малко време, затова е дорбе да се изчака", "Our site offers a variety of services, the first of which is scanning for hidden links.<br />It is designed to let go a spider.<br />The spider searches for links associated with important, for the site, points.<br />After the service finishes, it gives data if the links exist.<br />It could take some time for results to be produced, so, it’s advisable to wait a bit."); ?>
                            </div>
                        <div class="bottom"></div>
                    </div>
                </div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                <!-- Hexagon s text -->
                <div  id="frapp" class="rtab">
                    <div class="hex">
                        <div class="top"></div>
                        <div class="middle">
                            <img src="<?php echo(rel_path_inclusion("design/images/tcpportcheck.jpg", $dir)); ?>" alt="Грешка при зареждането" />
                        </div>
                            <div class="text_2" id="text_2">
                                <?php langPrint("Втората услуга на сайта ни е сканирането на IP адрес. <br>Тя се усъществява чрез въвеждането на Ip адре или URL на сайт. <br>След това има три възможности: сканиране на 1 порт, обсег от портове и най-често отворените. <br>След сканирането връща дали порта е отворен или не. <br>Ако порта е затворен или по рядко използван резултат ще се върне с малко забавяне.", "Our second service is the scanning of IP address.<br />It’s done by entering an IP address or URL of the site.<br />After that there are 3 possible options: scanning of one port, a range of ports or the most commonly used.<br />After the scanning is complete the result is either open or closed.<br />If the port is closed or more uncommonly used the result will be slower."); ?>
                            </div>
                        <div class="bottom"></div>
                    </div>
                </div><br /><br /><br /><br /><br /><br /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                <!-- Hexgon s text -->
                <div  id="slapp" class="ltab">
                    <div class="hex">
                        <div class="top"></div>
                        <div class="middle">
                            <img src="<?php echo(rel_path_inclusion("design/images/network.jpg", $dir)); ?>" alt="Грешка при зареждането" />
                        </div>
                            <div class="text_3" id="text_3">
                                <?php langPrint("Третата ни услуга е сканиране на локална мрежа. <br>В нея се въвежда порт и той се поверява. <br>Вашето IP е автоматично взето и показано на екрана, в случай че не го знаете. <br>Има три опции за проверяване на порт: на един порт, на обсег и на най-често отворените. <br>И в случай, че не могат да се засекат страниците ви, се подава съобщение.", "Out third service is scanning of local network.<br />You enter a port and it gets checked.<br />Your IP is shown on the screen in case you don’t know it.<br />There are 3 possible options: scanning of one port, a range of ports or the most commonly used.<br />If your pages cannot be detected, a message is displayed"); ?>
                            </div>
                        <div class="bottom"></div>
                    </div>
                </div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </div>
            <!-- Footer na stranicata -->
            <div style="position: absolute; bottom: -1000px; left: 0px; width: 100%; height: 50px; background: #6E80FE; color: #FFFFFF;">
                <?php echo '&copy;' , date("Y"); ?>
                <div id="feedback">
                    <a href="<?php echo(rel_path("feedback/index.php")) ?>"><?php langPrint("Отзиви", "Feedback"); ?></a>
                </div>
            </div>
        </div>
        <!-- Javascript file otgovarqsht za animaciite na stranicata -->
        <script src="<?php echo rel_path("design/js/animations.js" , $dir); ?>"></script>
    </body>
</html>
    
    