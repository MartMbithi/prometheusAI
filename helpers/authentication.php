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

/* Login */
if (isset($_SESSION['user_id'])) {
    /* Check If User Cookie Has Been Already Set */
    header('Location:home');
    exit;
} else if (isset($_COOKIE['wcf_auto_auth'])) {
    /* Decrypt User Cookie Variable */
    $user_id = decryptCookie($_COOKIE['wcf_auto_auth']);

    $sql_query = "SELECT COUNT(*) AS UserCount, user_id FROM user WHERE user_id = '{$user_id}'";
    $result = mysqli_query($mysqli, $sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['UserCount'];

    if ($count > 0) {
        $_SESSION['user_id'] = mysqli_real_escape_string($mysqli, $user_id);
        header('Location: home');
        exit;
    }
}
function encryptCookie($value)
{
    /* Encrypt User Cookie */
    $key = hex2bin(openssl_random_pseudo_bytes(4));

    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);

    $ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);

    return (base64_encode($ciphertext . '::' . $iv . '::' . $key));
}

function decryptCookie($ciphertext)
{
    /* Decrypt User Cookie */

    $cipher = "aes-256-cbc";

    list($encrypted_data, $iv, $key) = explode('::', base64_decode($ciphertext));
    return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);
}

/* Sign In */
if (isset($_POST['Sign_In'])) {

    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($mysqli, sha1(md5($_POST['user_password'])));

    if (!empty($user_email) && !empty($user_password)) {
        $sql_query = "SELECT COUNT(*) AS UserCount, user_id, user_set_theme FROM user 
        WHERE (user_email = '{$user_email}' || user_phone_number = '{$user_email}') AND user_password = '{$user_password}'";
        $result = mysqli_query($mysqli, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['UserCount'];
        if ($count > 0) {
            $user_id = $row['user_id'];
            $user_set_theme = $row['user_set_theme'];
            if (isset($_POST['wcf_auto_auth'])) {
                /* Set Cookies */
                $days = 20;
                $value = encryptCookie($user_id);
                setcookie("wcf_auto_auth", $value, time() + ($days *  24 * 60 * 60 * 1000));
            }

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_set_theme'] = $user_set_theme;
            header('Location:home');
            exit;
        } else {
            $err = "Incorrect login credentials, please try again";
        }
    } else {
        $err = 'Enter email and password';
    }
}

/* Sign Up */
if (isset($_POST['SignUp'])) {
    $user_id = mysqli_real_escape_string($mysqli, $ID);
    $user_full_name = mysqli_real_escape_string($mysqli, $_POST['user_full_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));
    $user_phone_number = mysqli_real_escape_string($mysqli, $_POST['user_phone_number']);
    $user_city = mysqli_real_escape_string($mysqli, $_POST['user_city']);
    $user_church_name = mysqli_real_escape_string($mysqli, $_POST['user_church_name']);
    $user_date_joined  = mysqli_real_escape_string($mysqli, date('d M Y'));
    include('../mailers/welcome.php');

    /* Check Passwords If Match */
    if ($confirm_password != $new_password) {
        $err = "Password does not match";
    } else {
        /* Check If This Email Or Password Exists */
        $sql = "SELECT * FROM  user WHERE user_email = '{$user_email}' || user_phone_number = '{$user_phone_number}'";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $err = "Email address or phone number already exists";
        } else {
            /* Compress User Image By Scale Factor Of .35 */
            if (!empty(mysqli_real_escape_string($mysqli, $_FILES['user_profile_picture']['name']))) {
                $userimage = "WCF_MEMBER_" . (round(microtime(true))) . $_FILES['user_profile_picture']['name'];
                $source = $_FILES['user_profile_picture']['tmp_name'];
                $destination = "https://wcf.co.ke/storage/user_profile_images/" . $userimage;
                $response = compressImage($source, $destination, 35);
                if (!empty($response)) {
                    /* Persist Record */
                    $new_user_sql = "INSERT INTO user (user_id, user_full_name, user_email, user_password, user_phone_number, user_city, user_church_name, user_profile_picture)
                    VALUES('{$user_id}', '{$user_full_name}', '{$user_email}', '{$confirm_password}', '{$user_phone_number}', '{$user_city}', '{$user_church_name}', '{$userimage}')";

                    if (mysqli_query($mysqli, $new_user_sql) && $mail->send()) {
                        $success = "Account created, proceed to sign in";
                    } else {
                        $err = "Please try again later";
                    }
                } else {
                    $info = "Failed to compress image, please try again";
                }
            } else {
                /* Persist User Record Without No Profile Picture */
                $new_user_sql = "INSERT INTO user (user_id, user_full_name, user_email, user_password, user_phone_number, user_city, user_church_name)
                VALUES('{$user_id}', '{$user_full_name}', '{$user_email}', '{$confirm_password}', '{$user_phone_number}', '{$user_city}', '{$user_church_name}')";

                if (mysqli_query($mysqli, $new_user_sql) && $mail->send()) {
                    $success = "Account created, proceed to sign in";
                } else {
                    $err = "Please try again later";
                }
            }
        }
    }
}

/* Reset Password */
if (isset($_POST['Reset_Password_Step_1'])) {
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $reset_token = mysqli_real_escape_string($mysqli, $tk);
    $one_time_password = mysqli_real_escape_string($mysqli, $otp);

    /* Check If This Account Exists */
    $sql = "SELECT * FROM  user WHERE user_email = '{$user_email}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        /*Persist Reset Token & One Time Password */
        $reset_token_sql = "UPDATE user SET user_password_reset_token = '{$reset_token}',
        user_otp_code = '{$one_time_password}' WHERE user_email = '{$user_email}'";

        /* Load Mailer */
        include('../mailers/reset_password.php');

        if (mysqli_query($mysqli, $reset_token_sql) && $mail->send()) {
            /* Pass This Alert Via Session */
            $_SESSION['user_email'] = $user_email;
            $_SESSION['success'] = 'Password reset instructions sent to your email';
            header('Location: confirm_otp');
            exit;
        } else {
            $info = "We cannot send this email now, try again later";
        }
    } else {
        $err = "Email does not exist";
    }
}

/* Reset Passsword Step 2 */
if (isset($_POST['Reset_Password_Step_2'])) {
    $user_otp_code = mysqli_real_escape_string($mysqli, $_POST['user_otp_code']);
    $user_email = mysqli_real_escape_string($mysqli, $_SESSION['user_email']);

    /* Check If This Account Exists */
    $sql = "SELECT * FROM  user WHERE user_otp_code = '{$user_otp_code}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        /*Persist Reset Token & One Time Password */
        $token_update_sql = "UPDATE user SET user_otp_code = '' WHERE user_email = '{$user_email}'";
        if (mysqli_query($mysqli, $token_update_sql)) {
            /* Pass This Alert Via Session */
            $_SESSION['success'] = 'Password reset code confirmed, proceed to reset password';
            header('Location: confirm_password');
            exit;
        } else {
            $info = "We cannot process your code for the moment, try again later";
        }
    } else {
        $err = "This code does not exist, kindly resend again";
    }
}


/* Password Reset Step 3 */
if (isset($_POST['Reset_Password_Step_3'])) {
    $user_email = mysqli_real_escape_string($mysqli, $_SESSION['user_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    if ($new_password != $confirm_password) {
        $err = "Passwords does not match";
    } else {
        $update_password_sql = "UPDATE user SET user_password = '{$confirm_password}' WHERE user_email ='{$user_email}'";
        if (mysqli_query($mysqli, $update_password_sql)) {
            $_SESSION['success'] = 'Password updated successfully';
            unset($_SESSION['email']);
            header('Location: index');
            exit;
        }
    }
}
