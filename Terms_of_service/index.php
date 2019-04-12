<?php

include("../system/functions.php");

$dir = basename(__DIR__); 

?>

<!doctype html>

<html lang="bg">
    <?php include(rel_path_inclusion("design/page_parts/head.php", $dir)); ?>
    
    <body>
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <div id="content">
                <div id="termsbox">
                    <div id="innerbox">
                    <h2> <?php langPrint("Собственост върху сайта", "Property rights"); ?> </h2>
                    <?php langPrint("Този сайт принадлежи на групата за олимпиада по математика съставена от Николай Стоянов и Златомир Желев и засега няма да бъде пуснат за употреба в интернет.", "This site belongs to the team formed for the national competition, consisting of Nikolay Stoyanov and Zlatomir Zhelev and won’t be released for now."); ?>
            
                    <h2> <?php langPrint("Употреба ", "Usage"); ?> </h2>
                    <?php langPrint("Сайтът е създаден само и единствено за доброто на създатели на сайтове и компании използващи такива, за проверката на сигурността им и уверяване в добротата й. Сайтът не е създаден за употреба от хакери и вреда и нападения над други сайтове. При подаден сигнал веднага ще бъде отстранен причинителя.", "The one and only purpose of the site is for wed developers and companies using sites to check their security and ensuring  their quality. It’s not made for hackers to abuse to attack other sites. On report the abuser will be removed instantly."); ?>
            
                    <h2> <?php langPrint("Държание на потребителите", "Behaviour"); ?> </h2>
                    <?php langPrint("Употреба на нецензорни думи, заяждане, карание, лични проблеми и клеветене са напълно недопустими и се наказват с бан.", "Usage of inappropriate words, fighting, defamation and personal problems are strictly prohibited."); ?>
            
                    <h2> <?php langPrint("Лични данни", "Personal Information"); ?> </h2>
                    <?php langPrint("Личните ви дани са в безопасност при нас и няма да бъдат продавани или използвани за лоши цели и наша угода.", "Your personal information won’t be revealed or sold to anyone and won’t be used for our profit."); ?>
            
                    <h2> <?php langPrint("Отговорност за щети", "Responsibility for damage done"); ?> </h2>
                    <?php langPrint("Не носим никаква отговорност извън банване на потребители за нанесени щети върху други сайтове. ", "We don’t carry any responsibility for damage done to other sites, except for banning the hackers from our site. "); ?>
                    </div>
                </div>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
        </div>
    </body>
</html>