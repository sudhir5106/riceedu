<?php
session_start(); # NOTE THE SESSION START
unset($_SESSION['cmid']);
unset($_SESSION['cmname']);
echo "true";
?>