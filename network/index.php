<?php

include("../system/functions.php");

$dir = basename(__DIR__); 

?>
<!doctype html>

<html>
    <?php include("../design/page_parts/head.php"); ?>
    
    
    <body>
        <!-- Opakovka na stranicata -->
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <!-- Sydyrjanie na stranicata -->
            <div id="content">
                <!-- Stranica kydeto  e sravnqvaneto za otvoreni portove lokalno -->
                <div id="tcpbox">
                    <!-- Vytreshna kutiq -->
                    <div id="innerbox">
                        <label><?php langPrint("Вашият IP адрес е: ", "You IP address is: "); ?><div id="ip"><?php echo(get_client_ip()); ?></div> <br /><?php langPrint("Ако е UNKNOWN това означава, че не можем да ви го намерим и функциите на тази страница не могат да бъдат използвани.", "If it's UNKNOWN, it means that we can't find it and the functions of this page can't be used."); ?></label><br /><br />
                        <br />
                        
                        <input type="radio" name="type" value="2" checked><?php langPrint("Сканиране на 1 порт", "Scan 1 port"); ?><br />
                        <input type="radio" name="type" value="3"><?php langPrint("Сканиране на обсег от портове", "Scan a range of ports"); ?><br />
                        <input type="radio" name="type" value="1"><?php langPrint("Топ най-често отворени", "Top most common open ports"); ?><br />
                    
                        <div id="buttons"></div><br />
                        
                        <div id="ip_result_handler"></div><br />
                        
                        <div id="timer"></div>
                        
                        <br />
                        
                        <input type="checkbox" value="Terms_of_service" /><?php langPrint("Съгласен съм с", "I agree to"); ?> <a href="<?php echo(rel_path_inclusion("Terms_of_service/index.php", $dir)); ?>"><?php langPrint("условията за използване на сайта", "the terms of use."); ?></a> <br/>
                        
                        <button id="button">&nbsp;&nbsp;<img src="../design/images/search.png" /> &nbsp;&nbsp;<?php langPrint("Сканирай сега!", "Scan now!"); ?>&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </div>
                <!-- Javascript otgovarqsht za deistviqta v stranicata -->
                <script>
                    var ip = document.getElementById("ip_result_handler");
                    var button_c = document.getElementById("button");
            
                    function startTime() {
                        var today = new Date();
                        var h = today.getHours();
                        var m = today.getMinutes();
                        var s = today.getSeconds();
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
                        document.getElementById("buttons").innerHTML = "";
                    
                        var TB1 = document.createElement("input");
                        TB1.setAttribute("id", "TB1");
                        TB1.setAttribute("value", "21");
                        TB1.setAttribute("class", "bb");
                        TB1.setAttribute("type", "text");
                        TB1.setAttribute("placeholder", "<?php langPrint("Например 80", "80 for example"); ?>");
                        document.getElementById("buttons").appendChild(TB1);
                        
                        startTime();
                    };
            
                    $('input[type="radio"]').on('click change', function(){
                        var count = 0;
                
                        if(document.querySelector('input[name="type"]:checked').value == "1")
                        {
                            document.getElementById("buttons").innerHTML = "";
                        }

                        else if(document.querySelector('input[name="type"]:checked').value == "2")
                        {
                            document.getElementById("buttons").innerHTML = "";
                    
                            var TB1 = document.createElement("input");
                            TB1.setAttribute("id", "TB1");
                            TB1.setAttribute("value", "21");
                            TB1.setAttribute("class", "bb");
                            TB1.setAttribute("type", "text");
                            TB1.setAttribute("placeholder", "<?php langPrint("Например 80", "80 for example"); ?>");
                            document.getElementById("buttons").appendChild(TB1);
                        }
                        else if(document.querySelector('input[name="type"]:checked').value == "3")
                        {
                            document.getElementById("buttons").innerHTML = "";
                    
                            var TB2 = document.createElement("input");
                            TB2.setAttribute("id", "TB2");
                            TB2.setAttribute("value", "21");
                            TB2.setAttribute("class", "bb");
                            TB2.setAttribute("type", "text");
                            TB2.setAttribute("placeholder", "<?php langPrint("Например 21", "21 for example"); ?>");
                            document.getElementById("buttons").appendChild(TB2);
                            
                            var BR = document.createElement("br");
                            document.getElementById("buttons").appendChild(BR);
                            
                            var BR1 = document.createElement("br");
                            document.getElementById("buttons").appendChild(BR1);
                    
                            var TB3 = document.createElement("input");
                            TB3.setAttribute("id", "TB3");
                            TB3.setAttribute("value", "22");
                            TB3.setAttribute("class", "bb");
                            TB3.setAttribute("type", "text");
                            TB3.setAttribute("placeholder", "<?php langPrint("Например 25", "25 for example"); ?>");
                            document.getElementById("buttons").appendChild(TB3);
                        }
                    });
                    
                    function JSONcall() {
                        var myRequest = new XMLHttpRequest();
                        var v1 = document.getElementById("ip_result_handler").innerHTML;
        
                        myRequest.open("POST", "../system/insert_history.php", true);
                        myRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        myRequest.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) 
                            {
                                //alert("done");
                            }
                        };
                        myRequest.send("user=<?php echo $_SESSION['username']; ?>&search=<?php echo(get_client_ip()); ?>&result=" + v1 + "&service=3");
                    }
            
                    button_c.onclick = function() {
                        ip.innerHTML = "Скан е пуснат на ";
                        if(document.querySelector('input[name="type"]:checked').value == "1")
                        {
                            CGI_call_post_cb("/cgi-bin/Python/tcp_thousand_ch.py", "ip_result_handler", "ip=" + document.getElementById("ip").value, JSONcall);
                        }
                        else if(document.querySelector('input[name="type"]:checked').value == "2")
                        {
                            CGI_call_post_cb("/cgi-bin/Python/tcp_one_ch.py", "ip_result_handler", "ip=" + "<?php echo(get_client_ip()); ?>" +"&port=" + TB1.value, JSONcall);
                        }
                        else if(document.querySelector('input[name="type"]:checked').value == "3")
                        {
                            CGI_call_post_cb("/cgi-bin/Python/tcp_range_ch.py", "ip_result_handler", "ip=" + "<?php echo(get_client_ip()); ?>"  +"&dport=" + TB2.value + "&uport=" + TB3.value, JSONcall);
                        }
                        
                        
                    };
                </script>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
            
        </div>
    </body>
</html>