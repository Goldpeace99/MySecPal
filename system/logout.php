<?php

error_reporting(E_ERROR | E_PARSE);
session_start();
session_unset();
session_destroy();

header("Location: ../index");

?>