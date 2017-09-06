<?php
session_start(); # NOTE THE SESSION START
unset($_SESSION['Login_Id']);
echo "true";
?>