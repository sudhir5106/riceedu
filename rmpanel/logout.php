<?php
session_start(); # NOTE THE SESSION START
unset($_SESSION['rmid']);
unset($_SESSION['rmname']);
echo "true";
?>