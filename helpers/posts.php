<?php
/*
 *   Crafted On Fri Nov 18 2022
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
/* Add Post */
if (isset($_POST['Add_Post'])) {
    $post_id = mysqli_real_escape_string($mysqli, $ID);
    $post_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $post_content = mysqli_real_escape_string($mysqli, $_POST['post_content']);
    $post_available_from = mysqli_real_escape_string($mysqli, date('Y-m-d g:ia'));


    if (!empty(mysqli_real_escape_string($mysqli, $_FILES['post_image']['name']))) {

        $postimage = "WCF_POST_" . (round(microtime(true))) . $_FILES['post_image']['name'];
        $source = $_FILES['post_image']['tmp_name'];
        $destination = "https://wcf.co.ke/storage/post_images/" . $postimage;
        $response = compressImage($source, $destination, 35);

        if (!empty($response)) {
            /* Persist Post */
            $add_post_sql = "INSERT INTO posts (post_id, post_user_id, post_content, post_image, post_available_from)
            VALUES('{$post_id}', '{$post_user_id}', '{$post_content}', '{$postimage}', '{$post_available_from}') ";

            if (mysqli_query($mysqli, $add_post_sql)) {
                $success = "Post published";
            } else {
                $err = "Please try again later";
            }
        } else {
            $info = "Image compression failed!";
        }
    } else {
        /* Persist A Non Image Post */
        $add_post_sql = "INSERT INTO posts (post_id, post_user_id, post_content,post_available_from)
        VALUES('{$post_id}', '{$post_user_id}', '{$post_content}', '{$post_available_from}') ";

        if (mysqli_query($mysqli, $add_post_sql)) {
            $success = "Post published";
        } else {
            $err = "Please try again later";
        }
    }
}

/* Schedule Post */
if (isset($_POST['Schedule_Post'])) {
    $post_id = mysqli_real_escape_string($mysqli, $ID);
    $post_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $post_content = mysqli_real_escape_string($mysqli, $_POST['post_content']);

    $post_available_from = mysqli_real_escape_string($mysqli, $_POST['post_available_from']);



    if (!empty(mysqli_real_escape_string($mysqli, $_FILES['post_image']['name']))) {

        $postimage = "WCF_POST_" . (round(microtime(true))) . $_FILES['post_image']['name'];
        $source = $_FILES['post_image']['tmp_name'];
        $destination = "https://wcf.co.ke/storage/post_images/" . $postimage;
        $response = compressImage($source, $destination, 35);

        if (!empty($response)) {
            /* Persist Post */
            $add_post_sql = "INSERT INTO posts (post_id, post_user_id, post_content, post_image, post_available_from)
            VALUES('{$post_id}', '{$post_user_id}', '{$post_content}', '{$postimage}', '{$post_available_from}') ";

            if (mysqli_query($mysqli, $add_post_sql)) {
                $success = "Post scheduled";
            } else {
                $err = "Please try again later";
            }
        } else {
            $info = "Image compress failed!";
        }
    } else {
        /* Persist A Non Image Post */
        $add_post_sql = "INSERT INTO posts (post_id, post_user_id, post_content, post_available_from)
        VALUES('{$post_id}', '{$post_user_id}', '{$post_content}', '{$post_available_from}') ";

        if (mysqli_query($mysqli, $add_post_sql)) {
            $success = "Post scheduled";
        } else {
            $err = "Please try again later";
        }
    }
}

/* Edit Post */
if (isset($_POST['Update_Post'])) {
    $post_id = mysqli_real_escape_string($mysqli, $_POST['post_id']);
    $post_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $post_content = mysqli_real_escape_string($mysqli, $_POST['post_content']);


    if (!empty(mysqli_real_escape_string($mysqli, $_FILES['post_image']['name']))) {

        $postimage = "WCF_POST_" . (round(microtime(true))) . $_FILES['post_image']['name'];
        $source = $_FILES['post_image']['tmp_name'];
        $destination = "https://wcf.co.ke/storage/post_images/" . $postimage;
        $response = compressImage($source, $destination, 35);

        if (!empty($response)) {
            /* Persist Post */
            $edit_post_sql = "UPDATE posts SET post_content = '{$post_content}', post_image = '{$postimage}' WHERE post_id = '{$post_id}'";

            if (mysqli_query($mysqli, $edit_post_sql)) {
                $_SESSION['success'] = 'Post updated';
                header("Location: my_posts");
                exit;
            } else {
                $err = "Please try again later";
            }
        } else {
            $info = "Image compress failed!";
        }
    } else {
        /* Persist A Non Image Post */
        $edit_post_sql = "UPDATE posts SET post_content  = '{$post_content}' WHERE post_id = '{$post_id}'";

        if (mysqli_query($mysqli, $edit_post_sql)) {
            $_SESSION['success'] = 'Post updated';
            header("Location: my_posts");
            exit;
        } else {
            $err = "Please try again later";
        }
    }
}

/* Delete Post */
if (isset($_POST['Delete_Post'])) {
    $post_id = mysqli_real_escape_string($mysqli, $_POST['post_id']);
    /* Delete Any Media Related To This Post */
    $posts_media_sql = mysqli_query($mysqli, "SELECT * FROM  posts  WHERE  post_id  = '{$post_id}'");
    if (mysqli_num_rows($posts_media_sql) > 0) {
        while ($post_media = mysqli_fetch_array($posts_media_sql)) {
            if (!empty($post_media['post_image'])) {
                /* Delete Clip */
                unlink("https://wcf.co.ke/storage/post_images/" . $post_media['post_image']);
            } else if (!empty($post_media['post_clip'])) {
                /* Delete Clip */
                unlink("https://wcf.co.ke/storage/post_images/" . $post_media['post_clip']);
            }
            /* Persist Delete */
            $delete_post = "DELETE FROM posts WHERE post_id = '{$post_id}'";
            if (mysqli_query($mysqli, $delete_post)) {
                $success = "Post deleted";
            } else {
                $err = "Please try again later";
            }
        }
    }
}

/* Add Book Mark */
if (isset($_POST['Add_Bookmark'])) {
    $bookmark_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $bookmark_post_id = mysqli_real_escape_string($mysqli, $_POST['bookmark_post_id']);

    /* Check If Post Already In Bookmarks */
    $sql = "SELECT * FROM  bookmarks WHERE bookmark_post_id = '{$bookmark_post_id}' AND bookmark_user_id = '{$bookmark_user_id}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $err  = "Already in bookmarks";
    } else {
        /* Persist */
        $add_bookmark_sql = "INSERT INTO bookmarks (bookmark_user_id, bookmark_post_id) VALUES('{$bookmark_user_id}', '{$bookmark_post_id}')";
        if (mysqli_query($mysqli, $add_bookmark_sql)) {
            $success = "Added to bookmarks";
        } else {
            $err = "Failed, please try again";
        }
    }
}

/* Remove Bookmark */
if (isset($_POST['Remove_Bookmark'])) {
    $bookmark_id = mysqli_real_escape_string($mysqli, $_POST['bookmark_id']);

    /* Persist */
    $unbookmark = "DELETE FROM bookmarks WHERE bookmark_id = '{$bookmark_id}'";

    if (mysqli_query($mysqli, $unbookmark)) {
        $success = "Bookmark removed";
    } else {
        $err = "Failed, please try again";
    }
}
