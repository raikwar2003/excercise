<?php
include 'classes/users.php';
$delRow=new users();
$delRow->delete();
header("Location: index.php");