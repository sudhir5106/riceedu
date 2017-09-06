<?php
session_start(); # NOTE THE SESSION START
unset($_SESSION['dmid']);
unset($_SESSION['dmname']);
echo "true";
?>