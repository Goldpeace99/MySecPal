<?php

$pointer = 0;

include("../system/functions.php");

$dir = basename(__DIR__); 

$db = mysqli_connect('localhost', 'mculabeu_zhelev', 'zlatomir', 'mculabeu_users');
$page = isset($_GET['user']) ? $_GET['user'] : 'error';

$user = base64_decode($page);

$info_query = "SELECT * FROM users_profiles WHERE username='$user' LIMIT 1";
$req = mysqli_query($db, $info_query);
$result = mysqli_fetch_object($req);

$email = $result->email;

$data = file_get_contents("../database/history.json");
$json = json_decode($data, true);

if(is_array($json))
{
    foreach($json as $key => $entry) 
    {
        if($entry['username'] == $user)
        {
            $ver = $json[$key]['verified'];
            $pointer = $key;
            break;
        }
    }
}

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
                <?php 
                    error_reporting(E_ERROR | E_PARSE);
                    session_start(); 
                        
                    $_SESSION['result1'] = $json[$pointer]["history1"]["result1"];
                    $_SESSION['result2'] = $json[$pointer]["history2"]["result2"];
                    $_SESSION['result3'] = $json[$pointer]["history3"]["result3"];
                    $_SESSION['result4'] = $json[$pointer]["history4"]["result4"];
                    $_SESSION['result5'] = $json[$pointer]["history5"]["result5"];
                    $_SESSION['result6'] = $json[$pointer]["history6"]["result6"];
                    $_SESSION['result7'] = $json[$pointer]["history7"]["result7"];
                    $_SESSION['result8'] = $json[$pointer]["history8"]["result8"];
                    $_SESSION['result9'] = $json[$pointer]["history9"]["result9"];
                    $_SESSION['result10'] = $json[$pointer]["history10"]["result10"];
                    
                    echo langRet("Потребител: ", "Username: ") . base64_decode($page). '<br />';
                    echo langRet("Електронна поща: ", "E-mail: ") . $email . '<br />';
                    echo '<a href="../system/logout.php">' . langRet("Изход", "Log out") . '</a><br />';
                    echo '<a href="../system/delete.php">' . langRet("Изтриване на профил", "Delete profile") . '</a>';
                ?>
                <table align="center">
                    <tr>
                        <th><?php langPrint("Услуга", "Service"); ?></th>
                        <th><?php langPrint("Цел", "Target"); ?></th>
                        <th><?php langPrint("Резултат", "Result"); ?></th>
                    </tr>
                    <hr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history1"]["service1"]); ?></td>
                        <td><?php tprint($json[$pointer]["history1"]["search1"]); ?></td>
                        <td><a href="../respr/index?p=a" target="_blank"><?php rcheck($json[$pointer]["history1"]["result1"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history2"]["service2"]); ?></td>
                        <td><?php tprint($json[$pointer]["history2"]["search2"]); ?></td>
                        <td><a href="../respr/index?p=b" target="_blank"><?php rcheck($json[$pointer]["history2"]["result2"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history3"]["service3"]); ?></td>
                        <td><?php tprint($json[$pointer]["history3"]["search3"]); ?></td>
                        <td><a href="../respr/index?p=c" target="_blank"><?php rcheck($json[$pointer]["history3"]["result3"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history4"]["service4"]); ?></td>
                        <td><?php tprint($json[$pointer]["history4"]["search4"]); ?></td>
                        <td><a href="../respr/index?p=d" target="_blank"><?php rcheck($json[$pointer]["history4"]["result4"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history5"]["service5"]); ?></td>
                        <td><?php tprint($json[$pointer]["history5"]["search5"]); ?></td>
                        <td><a href="../respr/index?p=e" target="_blank"><?php rcheck($json[$pointer]["history5"]["result5"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history6"]["service6"]); ?></td>
                        <td><?php tprint($json[$pointer]["history6"]["search6"]); ?></td>
                        <td><a href="../respr/index?p=f" target="_blank"><?php rcheck($json[$pointer]["history6"]["result6"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history7"]["service7"]); ?></td>
                        <td><?php tprint($json[$pointer]["history7"]["search7"]); ?></td>
                        <td><a href="../respr/index?p=g" target="_blank"><?php rcheck($json[$pointer]["history7"]["result7"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history8"]["service8"]); ?></td>
                        <td><?php tprint($json[$pointer]["history8"]["search8"]); ?></td>
                        <td><a href="../respr/index?p=h" target="_blank"><?php rcheck($json[$pointer]["history8"]["result8"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history9"]["service9"]); ?></td>
                        <td><?php tprint($json[$pointer]["history9"]["search9"]); ?></td>
                        <td><a href="../respr/index?p=i" target="_blank"><?php rcheck($json[$pointer]["history9"]["result9"]); ?></a></td>
                    </tr>
                    <tr>
                        <td><?php scomp($json[$pointer]["history10"]["service10"]); ?></td>
                        <td><?php tprint($json[$pointer]["history10"]["search10"]); ?></td>
                        <td><a href="../respr/index?p=j" target="_blank"><?php rcheck($json[$pointer]["history10"]["result10"]); ?></a></td>
                    </tr>
                </table>
                <?php include(rel_path_inclusion("design/page_parts/footer.php", $dir)); ?>
            </div>
        </div>
    </body>
</html>