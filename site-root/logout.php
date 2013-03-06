<?php

include_once('jobs/config.php');
/*
  $q="UPDATE user set user_logged='0' where user_id='".$_SESSION[current_user_id]."'";
  $r=mysql_query($q)or die(mysql_error());
 */
session_destroy();
$session = JFactory::getSession();
$session->clear('current_user_id');
$session->clear('current_user_uid');
$session->clear('current_user_type_name');
$session->clear('current_username');
$session->clear('logged');

$logged_user = "logged_" . $a[account_uid];
$session->clear("$logged_user");

header('location:index.php');
?>