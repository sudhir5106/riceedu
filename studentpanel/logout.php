<?php
session_start(); # NOTE THE SESSION START
unset($_SESSION['sid']);
unset($_SESSION['sname']);
echo "true";
?>