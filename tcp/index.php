<?php

include("../system/functions.php");

$dir = basename(__DIR__); 


?>
<!doctype html>

<html>
    <?php include("../design/page_parts/head.php"); ?>
    
    
    <body>
        <!-- Opakovkata na vsichko -->
        <div id="wrapper">
            <?php include(rel_path_inclusion("design/page_parts/header.php", $dir)); ?>
            <!-- Sydyrjanieto na stranicata -->
            <div id="content">
                <!-- Pravene na kutiq -->
                <div id="tcpbox">
                    <!-- Vytreshna kutiq -->
                    <div id="innerbox">
                        <label><?php langPrint("Моля въведете IP адрес/URL към сайт:", "Please enter an IP address or a URL to a website:"); ?></label><br /><br />
                        <input type="text" class="bb" placeholder="<?php langPrint("Например 192.168.0.1 или google.com", "192.168.0.1 or google.com for example"); ?>" name="ip_holder" id="ip"/><br />
                        <br />
                        <!-- Radio butoni -->
                        <input type="radio" name="type" value="2" checked><?php langPrint("Сканиране на 1 порт", "Scan 1 port"); ?><br />
                        <input type="radio" name="type" value="3"><?php langPrint("Сканиране на обсег от портове", "Scan a range of ports"); ?><br />
                        <input type="radio" name="type" value="1"><?php langPrint("Топ най-често отворени", "Top most common open ports"); ?><br />
                        <br />
                    
                        <div id="buttons"></div><br />
                    
                        <div id="ip_result_handler"></div><br />
                        
                        <br />
                        
                        <input type="checkbox" value="Terms_of_service" /><?php langPrint("Съгласен съм с", "I agree to"); ?> <a href="<?php echo(rel_path_inclusion("Terms_of_service/index.php", $dir)); ?>"><?php langPrint("условията за използване на сайта", "the terms of use."); ?></a> <br/>
                        
                        <button id="button">&nbsp;&nbsp;<img src="../design/images/search.png" /> &nbsp;&nbsp;<?php langPrint("Сканирай сега!", "Scan now!"); ?>&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </div>
                <!-- Javascrpt nujen za izvyrshvane na deistviq v stranicite -->
                <script>
                    var ip = document.getElementById("ip_result_handler");
                    var button_c = document.getElementById("button");
                    
                    var s = 0;
                    var m = 0;
                    var h = 0;
                    var t;
                    var timer_on = 0;
                    
                    function startTime() {
                        setInterval(count, 1000);
                    }
                    
                    function stopTime() {
                        timer_on = 0;
                        clearTimeout(t);
                    }
                    
                    function count() {
                        if(s == 60)
                        {
                            s = 0;
                            m++;
                        }
                        if(m == 60)
                        {
                            m = 0;
                            h++;
                        }
                         
                        var elementt = document.getElementById('time');
                        if (typeof(elementt) != 'undefined' && elementt != null)
                        {
                            elementt.innerHTML = h + ":" + m + ":" + s;
                            s++;
                        }
                        else
                        {
                           // stopTime();
                        }
                    }
            
                    window.onload = function() {
                        document.getElementById("buttons").innerHTML = "";
                    
                        var TB1 = document.createElement("input");
                        TB1.setAttribute("id", "TB1");
                        TB1.setAttribute("value", "80");
                        TB1.setAttribute("class", "bb");
                        TB1.setAttribute("type", "text");
                        TB1.setAttribute("placeholder", "<?php langPrint("Например 80", "80 for example"); ?>");
                        document.getElementById("buttons").appendChild(TB1);
                    }
            
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
                            TB1.setAttribute("value", "80");
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
                        myRequest.send("user=<?php echo $_SESSION['username']; ?>&search=" + document.getElementById("ip").value + "&result=" + v1 + "&service=1");
                        //alert(1);
                    }
                    
                    button_c.onclick = function() {
                        if(document.getElementById("ip").value != "")
                        {
                            s = 0;
                            m = 0;
                            h = 0;
                            ip.innerHTML = "Скан е пуснат на " + document.getElementById("ip").value + "<br />Изминало време: <div id='time'></div>";
                            startTime();
                            //JSONcall()
                            if(document.querySelector('input[name="type"]:checked').value == "1")
                            {
                                CGI_call_post_cb("/cgi-bin/Python/tcp_thousand_ch.py", "ip_result_handler", "ip=" + document.getElementById("ip").value, JSONcall);
                            }
                            else if(document.querySelector('input[name="type"]:checked').value == "2")
                            {
                                CGI_call_post_cb("/cgi-bin/Python/tcp_one_ch.py", "ip_result_handler", "ip=" + document.getElementById("ip").value +"&port=" + TB1.value, JSONcall);
                            }
                            else if(document.querySelector('input[name="type"]:checked').value == "3")
                            {
                                CGI_call_post_cb("/cgi-bin/Python/tcp_range_ch.py", "ip_result_handler", "ip=" + document.getElementById("ip").value   +"&dport=" + TB2.value + "&uport=" + TB3.value);
                            }
                        }
                    };
                    
                    $(button_c).on("click:after", function() {
                        JSONcall();
                    });
                        
                
                </script>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
            
        </div>
    </body>
</html>