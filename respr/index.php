<style>
    z { margin-right: 5.0em; }
    x { margin-right: 6.5em; }
</style>
<?php

error_reporting(E_ERROR | E_PARSE);
session_start();

$p = isset($_GET['p']) ? $_GET['p'] : 'error';

if($p == "a")
{
    echo $_SESSION['result1'];
}
if($p == "b")
{
    echo $_SESSION['result2'];
}
if($p == "c")
{
    echo $_SESSION['result3'];
}
if($p == "d")
{
    echo $_SESSION['result4'];
}
if($p == "e")
{
    echo $_SESSION['result5'];
}
if($p == "f")
{
    echo $_SESSION['result6'];
}
if($p == "g")
{
    echo $_SESSION['result7'];
}
if($p == "h")
{
    echo $_SESSION['result8'];
}
if($p == "i")
{
    echo $_SESSION['result9'];
}
if($p == "j")
{
    echo $_SESSION['result10'];
}

?>