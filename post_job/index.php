<?php

include("../system/functions.php");

$dir = basename(__DIR__); 

?>
<!doctype html>

<html>
    <?php include("../design/page_parts/head.php"); ?>
    
    <body>
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <div id="content">
                <div id="postbox">
                    <div id="innerbox">
                        <div align="center">
                            <h2 class="rg">Публикуване на обява за търсене на дупки в защитата</h2><br />
                            <div>
                                <label>Компания</label><br />
                                <input type="text" placeholder="Companiq" name="company"><br />
                            </div>
                            <br />
                            <div>
                                <label>Връзка</label><br />   
                                <input type="email" placeholder="Contact" name="contact"><br />
                            </div>
                            <br />
                            <div>
                                <label>PayPal</label><br />
                                <input type="text" placeholder="Credit card" name="creditcard"><br />
                            </div>
                            <br />
                            <div>
                                <label>Заглавие</label><br />    
                                <input type="text" placeholder="Title" name="title"><br />
                            </div>
                            <br />
                            <div>
                                <label>Лого на компанията</label><br />    
                                <input type="file" placeholder="logo" name="file"><br />
                            </div>
                            <br />
                            <div>
                                <label>Описание</label><br />
                                <input type="text" placeholder="description" name="description"><br />
                            </div>
                            <br />
                            <div>
                                <label>Цел</label><br />
                                <input type="text" placeholder="dest" name="dest"><br />
                            </div>
                            <br />
                            <input type="submit" value="Публикуване" name="postjob" ><br />
                        </div>
                    </div>
                </div>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
        </div>
    </body>
</html>