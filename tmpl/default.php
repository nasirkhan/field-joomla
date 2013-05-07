<?php
/*
 * mod_login_nasir
 * 
 * @package     mod_login_nasir
 * @version     1.0.1
 * @license     GNU/GPL v3 License - http://www.gnu.org/licenses/gpl.html
 * @author-name     Nasir Khan Saikat
 * @email       nasir8891@gmail.com
 * @website     http://nasirkhn.com
 * @description     
 */
$doc = & JFactory::getDocument();
$doc->addStyleSheet("modules/mod_login_nasir/css/style.css");

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

$logInUrl = $params->get('logInUrl');
$logOutUrl = $params->get('logOutUrl');
$registerUrl = $params->get('registerUrl');
$redirectUrl = $params->get('redirectUrl');
$moduleclass_sfx = $params->get('moduleclass_sfx');
?>


<div class="application_login <?php echo $moduleclass_sfx ?>" style="overflow:hidden !important;" >
    <?php
    $session = JFactory::getSession();
    if ($session->get('logged') == true) {
        $current_username = $session->get('current_username'); 
        $current_user_id = $session->get('current_user_id'); 
        $current_user_type_name = $session->get('current_user_type_name'); 
        ?>
        <style type="text/css">
        <?php if ($current_user_type_name == "Employer"){ ?>
            #dm_container_1{
                margin-top: -20px;        
                background: #F8F8F8 !important; 
                box-shadow: inset 0px 0px 10px #aaa;       
                -moz-box-shadow: inset 0px 0px 10px #aaa;
                -webkit-box-shadow: inset 0px 0px 10px #aaa;
                padding: 20px;
                height: 400px !important;
                width: 214px;
            }
            #dm_tabs_1{
                /*display: none;*/
            }
            .dm_menu_item_1.candidate-login{
                display: none !important;
            }

            <?php  }
            else { ?>
                #dm_container_1{
                    margin-top: -20px;        
                    background: #F8F8F8 !important; 
                    box-shadow: inset 0px 0px 10px #aaa;       
                    -moz-box-shadow: inset 0px 0px 10px #aaa;
                    -webkit-box-shadow: inset 0px 0px 10px #aaa;
                    padding: 20px;
                    height: 300px !important;
                    width: 214px;
                }
                #dm_tabs_1{
                    /*display: none;*/
                }
                .dm_menu_item_1.employer-login{
                    display: none !important;
                }
                <?php } ?>    

                </style>
                <div class="logged-in">
                    <div class="logged-in-text">
                        <?php echo "Logged in as: $current_username"; ?>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="h_line"></div>
                    <?php if ($current_user_type_name == "Employer"){ ?>
                    <div class="loggedin_box_heading">Account</div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <div class="loggedin_box_left"><a href="/jobs/employer_registration.php?param=edit&account_employer_id=<?php echo "$current_user_id";?>">Edit Profile</a></div>
                        <div class="loggedin_box_right"><a href="/jobs/employer_registration.php?param=edit&account_employer_id=<?php echo "$current_user_id";?>">Edit Company Details</a></div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <div class="loggedin_box_left"><a href="/jobs/employer_registration.php?param=edit&account_employer_id=<?php echo "$current_user_id";?>">Change Pass</a></div>
                        <div class="loggedin_box_right"><a href="/jobs/employer_registration.php?param=edit&account_employer_id=<?php echo "$current_user_id";?>">Change Logo</a></div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="h_line"></div>
                    <div class="loggedin_box_heading">Jobs</div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <div class="loggedin_box_left"><a href="/jobs/postjob.php">Post Vacancy</a></div>
                        <div class="loggedin_box_right"><a href="/jobs/employer_review_job.php">View Applications</a></div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <div class="loggedin_box_left"><a href="/jobs/index.php?pageType=search&job_account_id[]=<?php echo "$current_user_id";?>&view=myJobs">Edit Job Posting</a></div>
                        <div class="loggedin_box_right"></div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="h_line"></div>
                    <div class="loggedin_box_heading">Order</div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="#">Pre-employment Checks</a>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="#">On-line Skills Testing</a>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="#">View Order History</a>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="h_line"></div>
                    <div style="clear:both;"></div>
                    <div class="logout-btn-div">
                        <div style="clear:both;"></div>
                        <div class="logout-btn-div-text">
                            <a href="<?php echo $logOutUrl; ?>">Logout</a>
                        </div>
                    </div>
                    <?php  } 
                    else { ?>
                    <div class="loggedin_box_heading">Account</div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="/jobs/candidate_registration.php?param=edit&account_candidate_id=<?php echo "$current_user_id";?>">Edit Profile</a>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="/jobs/candidate_registration.php?param=edit&account_candidate_id=<?php echo "$current_user_id";?>">Change Password</a>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="/jobs/candidate_registration.php?param=edit&account_candidate_id=<?php echo "$current_user_id";?>">Upload New CV</a>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="h_line"></div>
                    <div class="loggedin_box_heading">Jobs</div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="/jobs/candidate_applied_jobs.php?account_id=<?php echo "$current_user_id";?>">View Jobs Applied For</a>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="loggedin_box_row">
                        <a href="/jobs/candidate_job_alert.php?param=edit&account_candidate_id=<?php echo "$current_user_id";?>">Manage Job Alerts</a>
                    </div>
                    
                    <div style="clear:both;"></div>
                    <div class="h_line"></div>
                    <div style="clear:both;"></div>
                    <div class="logout-btn-div">
                        <div style="clear:both;"></div>
                        <div class="logout-btn-div-text">
                            <a href="<?php echo $logOutUrl; ?>">Logout</a>
                        </div>
                    </div>

                    <?php  } ?>
                </div>

                <?php
            } else {
                ?>
                <form id='login' action='<?php echo $logInUrl; ?>' method='post' accept-charset='UTF-8'>
                    <fieldset >

                        <div class="user-name">
                            <label for='account_username'><strong>User Name:</strong></label>
                            <input type='text' name='account_username' id='account_username'  maxlength="50" />
                        </div>

                        <div class="password">
                            <label for='account_password'><strong>Password:</strong></label>
                            <input type='password' name='account_password' id='account_password' maxlength="50" />
                        </div>

                        <div class="pass"> </div>
                        <div class="submit-btn-div">
                            <div class="forgot-pass">
                                <a href="/jobs/forgot_password.php">Forgot Password?</a>
                            </div>
                            <div class="submit-btn">
                                <input type='submit' name='Submit' value='Login' />
                            </div>                    

                        </div>
                        <div class="login-text">
                            <span class="login-text-span1">Not Registered</span> Signing up is easy
                        </div>
                        <div style="clear:both;"></div>
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
