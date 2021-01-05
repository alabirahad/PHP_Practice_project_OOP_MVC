<?php
require_once '../classes/database.php';
require_once '../classes/LoginControl.php';
$database=new Database();
$loginControl=new LoginControl();

$loginControl->logout();

?>