<?php
/*
 *   Crafted On Sat Jan 07 2023
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


/* Add Wishlist Item */
if (isset($_POST['Add_Wishlist_Item'])) {
    $wishlist_item_category_id = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_category_id']);
    $wishlist_item_name = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_name']);
    $wishlist_item_qty = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_qty']);
    $wishlist_item_desc = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_desc']);
    $wishlist_item_cost = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_cost']);
    $wishlist_item_date_added = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_date_added']);
    $wishlist_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);


    /* Persist */
    $add_sql  = "INSERT INTO wishlists(wishlist_item_category_id, wishlist_item_name, wishlist_item_qty, wishlist_item_desc, wishlist_item_cost, wishlist_item_date_added, wishlist_user_id) 
    VALUES ('{$wishlist_item_category_id}', '{$wishlist_item_name}', '{$wishlist_item_qty}', '{$wishlist_item_desc}', '{$wishlist_item_cost}', '{$wishlist_item_date_added}', '{$wishlist_user_id}')";

    if (mysqli_query($mysqli, $add_sql)) {
        $success = "Item added to wishlist";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Wishlist Item */
if (isset($_POST['Update_Item_Wishlist'])) {
    $wishlist_item_category_id = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_category_id']);
    $wishlist_item_name = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_name']);
    $wishlist_item_qty = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_qty']);
    $wishlist_item_desc = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_desc']);
    $wishlist_item_cost = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_cost']);
    $wishlist_id = mysqli_real_escape_string($mysqli, $_POST['wishlist_id']);
    $wishlist_item_date_added = mysqli_real_escape_string($mysqli, $_POST['wishlist_item_date_added']);


    /* Persist */
    $update_sql  = "UPDATE wishlists SET  wishlist_item_category_id = '{$wishlist_item_category_id}', wishlist_item_name = '{$wishlist_item_name}',
    wishlist_item_qty = '{$wishlist_item_qty}', wishlist_item_desc = '{$wishlist_item_desc}', wishlist_item_cost = '{$wishlist_item_cost}', wishlist_item_date_added = '{$wishlist_item_date_added}'
    WHERE wishlist_id = '{$wishlist_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Item in wishlist updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Item From Wishlist */
if (isset($_POST['Delete_Wishlist'])) {
    $wishlist_id = mysqli_real_escape_string($mysqli, $_POST['wishlist_id']);

    /* Persist */
    $delete_sql = "DELETE FROM wishlists WHERE wishlist_id = '{$wishlist_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Removed";
    } else {
        $err = "Failed, please try again";
    }
}

/* Purchase Item From Wishlist */
if (isset($_POST['Add_To_Asset'])) {
    $asset_category_id = mysqli_real_escape_string($mysqli, $_POST['asset_category_id']);
    $asset_name = mysqli_real_escape_string($mysqli, $_POST['asset_name']);
    $asset_details = mysqli_real_escape_string($mysqli, $_POST['asset_details']);
    $asset_cost = mysqli_real_escape_string($mysqli, $_POST['asset_cost']);
    $asset_date_purchased = mysqli_real_escape_string($mysqli, $_POST['asset_date_purchased']);
    $asset_status = mysqli_real_escape_string($mysqli, $_POST['asset_status']);
    $asset_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $wishlist_id = mysqli_real_escape_string($mysqli, $_POST['wishlist_id']);

    /* Persist Details */
    $add_sql = "INSERT INTO assets(asset_category_id, asset_name, asset_details, asset_cost, asset_date_purchased, asset_status, asset_user_id)
    VALUES('{$asset_category_id}', '{$asset_name}', '{$asset_details}', '{$asset_cost}', '{$asset_date_purchased}', '{$asset_status}', '{$asset_user_id}')";

    /* Register That Expenditure On Expenses Row */
    $purchase_sql = "INSERT INTO purchases(purchase_user_id, purchase_item, purchase_quantity, purchase_amount,  purchase_date_made, purchase_details)
    VALUES('{$asset_user_id}', '{$asset_name}', '1', '{$asset_cost}', '{$asset_date_purchased}', '{$asset_details}')";

    /* Delete It From Wishlist */
    $move_sql = "DELETE FROM wishlists WHERE wishlist_id = '{$wishlist_id}'";
    if (mysqli_query($mysqli, $add_sql) && mysqli_query($mysqli, $move_sql) && mysqli_query($mysqli, $purchase_sql)) {
        $success = "Asset added";
    } else {
        $err = "Failed, please try again";
    }
}
