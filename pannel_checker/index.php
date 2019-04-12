<?php

include("../system/functions.php");

$dir = basename(__DIR__); 

?>

<!doctype html>

<html>
    <?php include("../design/page_parts/head.php"); ?>
    
    <body>
        <!-- Opakovka -->
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <!-- Sydyrjanie -->
            <div id="content">
                <!-- Kutiq v koqto se sydyrja skaniraneto za skriti linkove  -->
                <div id="pannelbox">
                    <!-- Vytreshna kutiq -->
                    <div id="innerbox">
                        <label><?php langPrint("Въведете Domain името на сайт или съответния му IP адрес:", "Enter Doamin name of the site or its IP address"); ?></label><br /><br />
                        <input type="text" placeholder="<?php langPrint("Например google.com", "Google.com for example"); ?>" class="bb" name="pannel_holder" id="pannel_holder"/><br /><br /><br />
                        <div id="pannel_result_holder"></div>
                        
                        <div id="timer"></div>
                        
                        <br />
                            <input type="checkbox" value="Terms_of_service">
                            <?php langPrint("Съгласен съм с", "I agree to"); ?>
                            <a href="../Terms_of_service/index.php"><?php langPrint("условия за използване", "the terms of service"); ?></a>
                        <br />
                        <button id="button">&nbsp;&nbsp;<img src="../design/images/search.png" /> &nbsp;&nbsp;<?php langPrint("Сканирай сега!", "Scan now!"); ?>&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </div>
                <!-- Javascript otgovoren za raboteneto na stranicata -->
                <script>
                    var pannel = document.getElementById("panel_result_holder");
                    var button = document.getElementById("button");
            
                    function startTime() {
                        var today = new Date();
                        var h = 0;
                        var m = 0;
                        var s = 0;
                        m = checkTime(m);
                        s = checkTime(s);
                        document.getElementById('timer').innerHTML =
                        h + ":" + m + ":" + s;
                        var t = setTimeout(startTime, 500);
                    }
                    
                    function checkTime(i) {
                        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                        return i;
                    }
                    
                    window.onload = function() {
                        startTime();
                    };
                    
                    function JSONcall() {
                        var myRequest = new XMLHttpRequest();
                        var v1 = document.getElementById("pannel_result_holder").innerHTML;
        
                        myRequest.open("POST", "../system/insert_history.php", true);
                        myRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        myRequest.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) 
                            {
                                //alert("done");
                            }
                        };
                        myRequest.send("user=<?php echo $_SESSION['username']; ?>&search=" + document.getElementById("pannel_holder").value + "&result=" + v1 + "&service=2");
                    }
            
                    button.onclick = function() { 
                        //var validUrl = True;
                        if(document.getElementById("pannel_holder").value != "")
                        {
                            CGI_call_post_cb("/cgi-bin/Python/urlch.py", "pannel_result_holder" , "url=" + document.getElementById("pannel_holder").value, JSONcall);
                        }
                
                    }
                </script>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
            
        </div>
    </body>
</html>
