<?php

include('jobs/config.php');
$session = JFactory::getSession();
if ($_SESSION['logged'] == true) {
    header("location:index.php");
}

//echo $_SESSION['redirect_url'];
$valid = true;
$alert = array();
if (isset($_POST[Submit])) {
    $account_username = mysql_real_escape_string(trim($_POST[account_username]));
    $account_password = mysql_real_escape_string(trim($_POST[account_password]));

    if (empty($account_username) || empty($account_password)) {
        $valid = false;
        array_push($alert, "You cannot leave username or password field empty");
    }

    if ($valid) {
        $sql = "select * from account where account_username='$account_username' && account_password='$account_password'";
        $r = mysql_query($sql) or die(mysql_error());
        if (mysql_num_rows($r) > 0) {
            $a = mysql_fetch_assoc($r);
            /*
             *  load user info in SESSION
             */
            
            $session->set('current_user_id',$a[account_id]);
            $session->set('current_user_uid',$a[account_uid]);
            $session->set('current_user_type_name',$a[account_user_type_name]);
            $session->set('current_username',$a[account_username]);
            $session->set('logged',true);
            $logged_user= "logged_" . $a[account_uid] ;
            $session->set("$logged_user" ,true);
            
            
            $_SESSION[current_user_id] = $a[account_id];
            $_SESSION[current_user_uid] = $a[account_uid];
            $_SESSION[current_user_type_name] = $a[account_user_type_name];
            $_SESSION[current_username] = $a[account_username];
            $_SESSION[logged] = true;
            $_SESSION["logged_" . $a[account_uid]] = true;
            /*             * ************************** */
            /*
             * update user login in database
             */
            insertLog('Login', 'User logged in', $log_affected_table_name, $log_affected_table_primary_key_field, $log_affected_table_primary_key_value, $log_sql_query_string, $_SESSION[current_user_id], print_r($_SERVER, true));
        } else {
            $valid = false;
            array_push($alert, "username/password missmatch");
        }
    }
    if ($_SESSION[logged] == true) {
        header("location:index.php");
        // if (strlen($_SESSION['redirect_url'])) {
        //     header("location:" . $_SESSION['redirect_url']);
        // } else {
        //     header("location:index.php");
        //     //header("location:security_assignment_list.php");
        // }
    }
}
?>

