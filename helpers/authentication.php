<?php
/*
 *   Crafted On Sat Oct 08 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */


/* Sign In */
if (isset($_POST['Login'])) {

    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($mysqli, sha1(md5($_POST['user_password'])));


    /* Handle Auth */
    $stmt = $mysqli->prepare("SELECT user_id, user_name, user_email, user_password, user_access_level FROM user 
    WHERE user_email = '{$user_email}' AND user_password = '{$user_password}'");
    $stmt->execute();
    $stmt->bind_result($user_id, $user_name, $user_email, $user_password, $user_access_level);
    $rs = $stmt->fetch();

    /* Session Variables */
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_access_level'] = $user_access_level;

    if ($rs) {
        /* Pass This Alert Via Session */
        $_SESSION['success'] = 'You have successfully logged in';
        header('Location: dashboard');
        exit;
    } else {
        $err = "Access denied please check your email or password";
    }
}

switch (connection_status()) {
    case CONNECTION_NORMAL:
        /* This Will Trigger Mailer To Send Email Address */
        break;
    case (CONNECTION_ABORTED || CONNECTION_TIMEOUT):
        /* This Will Trigger Default Password Reset Without No Email */
        /* This Steps Are Followed When This System Is Deployed Offline - No Internet Connection */
        /* Reset Password */
        if (isset($_POST['Reset_Password_Step_1'])) {
            $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);

            /* Check If This Account Exists */
            $sql = "SELECT * FROM  user WHERE user_email = '{$user_email}'";
            $res = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($res) > 0) {
                /*
            This system will be used offline so just redirect user to password reset 
            */
                $_SESSION['success'] = 'Email confirmed, proceed to reset password';
                $_SESSION['user_email'] = $user_email;
                header('Location: confirm_password');
                exit;
            } else {
                $err = "Email does not exist";
            }
        }


        /* Password Reset Step 2 */
        if (isset($_POST['Reset_Password_Step_2'])) {
            $user_email = mysqli_real_escape_string($mysqli, $_SESSION['user_email']);
            if (!empty($user_email)) {
                $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
                $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

                if ($new_password != $confirm_password) {
                    $err = "Passwords does not match";
                } else {
                    $update_password_sql = "UPDATE user SET user_password = '{$confirm_password}' WHERE user_email ='{$user_email}'";
                    if (mysqli_query($mysqli, $update_password_sql)) {
                        $_SESSION['success'] = 'Password updated successfully';
                        unset($_SESSION['email']);
                        header('Location: ../');
                        exit;
                    } else {
                        $err = "Password reset failed, please try again";
                    }
                }
            } else {
                $_SESSION['err'] = 'Kindly enter a valid password';
                header('Location: reset_password');
                exit;
            }
        }
        break;

    default:
        /* This Will Trigger Default Password Reset Without No Email */
        /* This Steps Are Followed When This System Is Deployed Offline - No Internet Connection */
        /* Reset Password */
        if (isset($_POST['Reset_Password_Step_1'])) {
            $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);

            /* Check If This Account Exists */
            $sql = "SELECT * FROM  user WHERE user_email = '{$user_email}'";
            $res = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($res) > 0) {
                /*
            This system will be used offline so just redirect user to password reset 
            */
                $_SESSION['success'] = 'Email confirmed, proceed to reset password';
                $_SESSION['user_email'] = $user_email;
                header('Location: confirm_password');
                exit;
            } else {
                $err = "Email does not exist";
            }
        }


        /* Password Reset Step 2 */
        if (isset($_POST['Reset_Password_Step_2'])) {
            $user_email = mysqli_real_escape_string($mysqli, $_SESSION['user_email']);
            if (!empty($user_email)) {
                $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
                $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

                if ($new_password != $confirm_password) {
                    $err = "Passwords does not match";
                } else {
                    $update_password_sql = "UPDATE user SET user_password = '{$confirm_password}' WHERE user_email ='{$user_email}'";
                    if (mysqli_query($mysqli, $update_password_sql)) {
                        $_SESSION['success'] = 'Password updated successfully';
                        unset($_SESSION['email']);
                        header('Location: ../');
                        exit;
                    } else {
                        $err = "Password reset failed, please try again";
                    }
                }
            } else {
                $_SESSION['err'] = 'Kindly enter a valid password';
                header('Location: reset_password');
                exit;
            }
        }
        break;
}
