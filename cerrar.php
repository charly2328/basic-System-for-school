<?php
@session_start();
session_destroy();
header("Location: /Proyecto-respaldo/index.php");
?>