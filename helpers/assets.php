<?php
/*
 *   Crafted On Sat Dec 17 2022
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



/* Add Asset Category */
if (isset($_POST['Add_Asset_Category'])) {
    $category_code = mysqli_real_escape_string($mysqli, $_POST['category_code']);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);
    $category_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);

    /* Persist Register */
    $add_category = "INSERT INTO assets_category(category_user_id, category_code, category_name) VALUES('{$category_user_id}','{$category_code}', '{$category_name}')";
    if (mysqli_query($mysqli, $add_category)) {
        $success = "Asset category registered";
    } else {
        $err = "Failed, please try again";
    }
}


/* Update Asset Category */
if (isset($_POST['Update_Asset_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);
    $category_code = mysqli_real_escape_string($mysqli, $_POST['category_code']);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);

    /* Persist Update */
    $update_sql = "UPDATE assets_category SET category_code = '{$category_code}', category_name = '{$category_name}' WHERE category_id = '{$category_id}'";
    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Asset category updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Asset Category */
if (isset($_POST['Delete_Asset_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);

    /* Persist Delete */
    $delete_sql = "DELETE FROM assets_category WHERE category_id = '{$category_id}'";
    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Asset category deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Asset */
if (isset($_POST['Add_Asset'])) {
    $asset_category_id = mysqli_real_escape_string($mysqli, $_POST['asset_category_id']);
    $asset_name = mysqli_real_escape_string($mysqli, $_POST['asset_name']);
    $asset_details = mysqli_real_escape_string($mysqli, $_POST['asset_details']);
    $asset_cost = mysqli_real_escape_string($mysqli, $_POST['asset_cost']);
    $asset_date_purchased = mysqli_real_escape_string($mysqli, $_POST['asset_date_purchased']);
    $asset_status = mysqli_real_escape_string($mysqli, $_POST['asset_status']);
    $asset_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);

    /* Persist Details */
    $add_sql = "INSERT INTO assets(asset_category_id, asset_name, asset_details, asset_cost, asset_date_purchased, asset_status, asset_user_id)
    VALUES('{$asset_category_id}', '{$asset_name}', '{$asset_details}', '{$asset_cost}', '{$asset_date_purchased}', '{$asset_status}', '{$asset_user_id}')";

    if (mysqli_query($mysqli, $add_sql)) {
        $success = "Asset added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Asset */
if (isset($_POST['Update_Asset'])) {
    $asset_category_id = mysqli_real_escape_string($mysqli, $_POST['asset_category_id']);
    $asset_name = mysqli_real_escape_string($mysqli, $_POST['asset_name']);
    $asset_details = mysqli_real_escape_string($mysqli, $_POST['asset_details']);
    $asset_cost = mysqli_real_escape_string($mysqli, $_POST['asset_cost']);
    $asset_date_purchased = mysqli_real_escape_string($mysqli, $_POST['asset_date_purchased']);
    $asset_status = mysqli_real_escape_string($mysqli, $_POST['asset_status']);
    $asset_id = mysqli_real_escape_string($mysqli, $_POST['asset_id']);

    /* Persist Details */
    $update_sql = "UPDATE assets SET asset_name = '{$asset_name}', asset_details  = '{$asset_details}', asset_category_id = '{$asset_category_id}',
    asset_cost = '{$asset_cost}', asset_date_purchased = '{$asset_date_purchased}', asset_status = '{$asset_status}' 
    WHERE asset_id = '{$asset_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Asset updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Asset */
if (isset($_POST['Delete_Asset'])) {
    $asset_id = mysqli_real_escape_string($mysqli, $_POST['asset_id']);

    /* Persist */
    $delete_sql = "DELETE FROM assets WHERE asset_id = '{$asset_id}'";
    if (mysqli_query($mysqli, $delete_sql)) {
        $success  = "Asset deleted";
    } else {
        $err = "Failed, please try again";
    }
}
