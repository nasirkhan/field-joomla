<?php
/*
 * mod_login_nasir
 * 
 * @package		mod_login_nasir
 * @version		1.0.1
 * @license		GNU/GPL v3 License - http://www.gnu.org/licenses/gpl.html
 * @author-name		Nasir Khan Saikat
 * @email		nasir8891@gmail.com
 * @website		http://nasirkhn.com
 * @description		
 */

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

$logInUrl = $params->get('logInUrl');
$logOutUrl = $params->get('logOutUrl');
$registerUrl = $params->get('registerUrl');
$redirectUrl = $params->get('redirectUrl');
$moduleclass_sfx = $params->get('moduleclass_sfx');
?>


<div class="application_login<?php echo $moduleclass_sfx ?>" style="overflow:hidden !important;" >
    <?php
    $session = JFactory::getSession();
    if ($session->get('logged') == true) {
        $current_username = $session->get('current_username');        
        ?>
        <style type="text/css">
            #dm_container_1{
                margin-top: -20px;                
            }
            #dm_tabs_1{
                display: none;
            }
        </style>
        <div class="logged-in">
            <div class="logged-in-text">
                <?php echo "Welcome $current_username"; ?>
            </div>
            <div class="logout-btn-div">
                <a href="<?php echo $logOutUrl; ?>">Logout</a>
            </div>
        </div>
        
        <?php
    } else {
        ?>
        <form id='login' action='<?php echo $logInUrl; ?>' method='post' accept-charset='UTF-8'>
            <fieldset >

                <div class="user-name">
                    <label for='account_username'>User Name</label>
                    <input type='text' name='account_username' id='account_username'  maxlength="50" />
                </div>

                <div class="password">
                    <label for='account_password'>Password</label>
                    <input type='password' name='account_password' id='account_password' maxlength="50" />
                </div>

                <div class="pass"> </div>
                <div class="submit-btn-div">
                    <div class="forgot-pass">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="submit-btn">
                        <input type='submit' name='Submit' value='Login' />
                    </div>                    
                    
                </div>
                <div class="login-text">
                    Not Registered Signing up is easy
                </div>
                <div class="register-now">
                    <a href="<?php echo $registerUrl; ?>">Register Now</a>
                </div>
                
            </fieldset>
        </form>
        <?php
        
//        echo "<br><br>You are not logged in. <br>";
    }

   // echo "<br>SESSION<br>";
   // echo "<pre>";
   // print_r($_SESSION);
   // echo "</pre>";
    ?>

</div>
