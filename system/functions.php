<?php

function langPrint($bg, $en)
{
    if(!isset($_GET['lang']))
    {
        echo $bg;
    }
    else if(isset($_GET['lang']) && !empty($_GET['lang']))
    {
        if($_GET['lang'] == "en")
        {
            echo $en;
        }
        else
        {
            echo $bg;
        }
    }
    else
    {
        echo $bg;
    }
}


function scomp($s)
{
    if($s == "1")
    {
        langPrint("Сканиране на IP адрес", "IP address scan");
    }
    if($s == "2")
    {
        langPrint("Търсене на скрити линкове", "Searching for hidden links");
    }
    if($s == "3")
    {
        langPrint("Сканирай локална мрежа", "Scan local network");
    }
    if(!isset($s) || $s == 0 || $s == "")
    {
        langPrint("Няма търсения", "Nothing's been found");
    }
}


function tprint($t)
{
    if(!isset($t) || $t == "")
    {
        langPrint("Няма цел", "No dest");
    }
    else
    {
        echo $t;
    }
}

function rcheck($r)
{
    if(!isset($r) || $r == "")
    {
        langPrint("Няма резултат", "There is no result");
    }
    else
    {
        langPrint("Тука ви се намира резултата", "Here you can see your result");
    }
}

function langRet($bg, $en)
{
    if(!isset($_GET['lang']))
    {
        return $bg;
    }
    else if(isset($_GET['lang']) && !empty($_GET['lang']))
    {
        if($_GET['lang'] == "en")
        {
            return $en;
        }
        else
        {
            return $bg;
        }
    }
    else
    {
        return $bg;
    }
}

function img_active($fileName , $file_dir , $need_dir)
{
    $current_dir = $file_dir;
    $needing = $need_dir;
    
    if($current_dir == $needing)
    {
        $fileName .= "_a";
    }
    
    return "design/images/" . $fileName . ".jpg";
}

function rel_path($path , $file_dir)
{
    $current_dir = $file_dir;
    
    if($current_dir == "public_html" || $current_dir == "system")
    {
        echo $path;
    }
    else
    {
        if($current_dir == "page_parts" || $current_dir == "js" || $current_dir == "images" || $current_dir == "css")
        {
            echo "../../" . $path;
        }
        else
        {
            echo "../" . $path;
        }
    }
}

function rel_path_inclusion($path , $file_dir)
{
    $current_dir = $file_dir;
    
    if($current_dir == "public_html" || $current_dir == "system")
    {
        return $path;
    }
    else
    {
        if($current_dir == "page_parts" || $current_dir == "js" || $current_dir == "images" || $current_dir == "css")
        {
            $str = "../../" . $path;
            return $str;
        }
        else
        {
            $str = "../" . $path;
            return $str;
        }
    }
}

function u_en($string="") 
{
    return urlencode($string);
}

function raw_u_en($string="") 
{
    return rawurlencode($string);
}

function h_char($string="") 
{
    return htmlspecialchars($string);
}

function error_404()
{
	header($SERVER_["SERVER_PROTOCOL"] . " 404 Not found! ");
	exit();
}

function error_500()
{
	header($SERVER_["SERVER_PROTOCOL"] . " 500 Internal server error! ");
	exit();
}

function redirection($location)
{
    header("Location: ". $location);
    exit;
}

function post_request_check()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}	

function get_request_check()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function get_client_ip() 
{
    $ipaddress = '';
    
    if (getenv('HTTP_CLIENT_IP'))
    {
        $ipaddress = getenv('HTTP_CLIENT_IP');
    }
    else if(getenv('HTTP_X_FORWARDED_FOR'))
    {
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    }
    else if(getenv('HTTP_X_FORWARDED'))
    {
        $ipaddress = getenv('HTTP_X_FORWARDED');
    }
    else if(getenv('HTTP_FORWARDED_FOR'))
    {
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    }
    else if(getenv('HTTP_FORWARDED'))
    {
       $ipaddress = getenv('HTTP_FORWARDED');
    }
    else if(getenv('REMOTE_ADDR'))
    {
        $ipaddress = getenv('REMOTE_ADDR');
    }
    else
    {
        $ipaddress = 'UNKNOWN';
    }
    
    return $ipaddress;
}

function pasteComments($db)
{
    $sqlGet = "SELECT * FROM feedback";
        $resultGet = mysqli_query($db, $sqlGet);
        while($row = mysqli_fetch_assoc($resultGet))
        {
            echo "<div class='comBox'><p>";
                echo $row['author'].'<br>';
                echo $row['date'].'<br>';
                echo nl2br($row['description'].'<br>');
            echo "</p></div>";
        }
}

?>

