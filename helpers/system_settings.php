<?php
/*
 *   Crafted On Mon Jan 16 2023
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


/* Update Mailer */
if (isset($_POST['Update_Mailer_Settings'])) {
    $mailer_host = mysqli_real_escape_string($mysqli, $_POST['mailer_host']);
    $mailer_port = mysqli_real_escape_string($mysqli, $_POST['mailer_port']);
    $mailer_protocol  = mysqli_real_escape_string($mysqli, $_POST['mailer_protocol']);
    $mailer_username = mysqli_real_escape_string($mysqli, $_POST['mailer_username']);
    $mailer_mail_from_name = mysqli_real_escape_string($mysqli, $_POST['mailer_mail_from_name']);
    $mailer_mail_from_email = mysqli_real_escape_string($mysqli, $_POST['mailer_mail_from_email']);
    $mailer_password = mysqli_real_escape_string($mysqli, $_POST['mailer_password']);
    /* No Mailer ID, So Only One STMP Mailer Is Available */

    /* Persist Mailer Changes */
    $update_sql = "UPDATE mailer_settings SET mailer_host = '{$mailer_host}', mailer_port = '{$mailer_port}', 
    mailer_protocol = '{$mailer_protocol}', mailer_username = '{$mailer_username}', mailer_mail_from_name = '{$mailer_mail_from_name}',
    mailer_mail_from_email = '{$mailer_mail_from_email}', mailer_password = '{$mailer_password}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "STMP mailer settings updated";
    } else {
        $err = "Failed, please try again";
    }
}


/* Back Up Local DB */
if (isset($_POST['Settings_Backup_Local_Db'])) {
    function EXPORT_DATABASE($host, $dbuser, $dbpass, $db, $tables = false, $backup_name = false)
    {
        set_time_limit(3000);
        $mysqli = new mysqli($host, $dbuser, $dbpass, $db);
        $mysqli->select_db($db);
        $mysqli->query("SET NAMES 'utf8'");
        $queryTables = $mysqli->query('SHOW TABLES');
        while ($row = $queryTables->fetch_row()) {
            $target_tables[] = $row[0];
        }
        if ($tables !== false) {
            $target_tables = array_intersect($target_tables, $tables);
        }
        $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `" . $db . "`\r\n--\r\n\r\n\r\n";
        foreach ($target_tables as $table) {
            if (empty($table)) {
                continue;
            }
            $result    = $mysqli->query('SELECT * FROM `' . $table . '`');
            $fields_amount = $result->field_count;
            $rows_num = $mysqli->affected_rows;
            $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
            $TableMLine = $res->fetch_row();
            $content .= "\n\n" . $TableMLine[1] . ";\n\n";
            $TableMLine[1] = str_ireplace('CREATE TABLE `', 'CREATE TABLE IF NOT EXISTS `', $TableMLine[1]);
            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                    if ($st_counter % 100 == 0 || $st_counter == 0) {
                        $content .= "\nINSERT INTO " . $table . " VALUES";
                    }
                    $content .= "\n(";
                    for ($j = 0; $j < $fields_amount; $j++) {
                        $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                        if (isset($row[$j])) {
                            $content .= '"' . $row[$j] . '"';
                        } else {
                            $content .= '""';
                        }
                        if ($j < ($fields_amount - 1)) {
                            $content .= ',';
                        }
                    }
                    $content .= ")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                        $content .= ";";
                    } else {
                        $content .= ",";
                    }
                    $st_counter = $st_counter + 1;
                }
            }
            $content .= "\n\n\n";
        }
        $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
        $backup_name = $backup_name ? $backup_name : $db . '_(' . date('H-i-s') . '_' . date('d-m-Y') . ').sql';
        ob_get_clean();
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header('Content-Length: ' . (function_exists('mb_strlen') ? mb_strlen($content, '8bit') : strlen($content)));
        header("Content-disposition: attachment; filename=\"" . $backup_name . "\"");
        echo $content;
        exit;
    }
    /* Invoke Export Function */
    if (EXPORT_DATABASE("$host", "$dbuser", "$dbpass", "$db")) {
        $success = "Database exported";
    } else {
        $err  =  "Failed, please try again";
    }
}

/* Back Up Remote DB */
if (isset($_POST['Settings_Backup_Remote_Db'])) {
    /* Get Remote DB Configs */
    $remote_dbs_sql = mysqli_query($mysqli, "SELECT * FROM remote_dbs");
    if (mysqli_num_rows($remote_dbs_sql) > 0) {
        while ($sys_configs = mysqli_fetch_array($remote_dbs_sql)) {
            /* Remote DB Details */
            $remote_host = $sys_configs['remote_db_host'];
            $remote_database = $sys_configs['remote_db_name'];
            $remote_user = $sys_configs['remote_db_user'];
            $remote_password = $sys_configs['remote_db_password'];

            /* Export Function */
            function EXPORT_DATABASE($host, $dbuser, $dbpass, $db, $tables = false, $backup_name = false)
            {
                set_time_limit(3000);
                $mysqli = new mysqli($host, $dbuser, $dbpass, $db);
                $mysqli->select_db($db);
                $mysqli->query("SET NAMES 'utf8'");
                $queryTables = $mysqli->query('SHOW TABLES');
                while ($row = $queryTables->fetch_row()) {
                    $target_tables[] = $row[0];
                }
                if ($tables !== false) {
                    $target_tables = array_intersect($target_tables, $tables);
                }
                $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `" . $db . "`\r\n--\r\n\r\n\r\n";
                foreach ($target_tables as $table) {
                    if (empty($table)) {
                        continue;
                    }
                    $result    = $mysqli->query('SELECT * FROM `' . $table . '`');
                    $fields_amount = $result->field_count;
                    $rows_num = $mysqli->affected_rows;
                    $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
                    $TableMLine = $res->fetch_row();
                    $content .= "\n\n" . $TableMLine[1] . ";\n\n";
                    $TableMLine[1] = str_ireplace('CREATE TABLE `', 'CREATE TABLE IF NOT EXISTS `', $TableMLine[1]);
                    for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                        while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                            if ($st_counter % 100 == 0 || $st_counter == 0) {
                                $content .= "\nINSERT INTO " . $table . " VALUES";
                            }
                            $content .= "\n(";
                            for ($j = 0; $j < $fields_amount; $j++) {
                                $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                                if (isset($row[$j])) {
                                    $content .= '"' . $row[$j] . '"';
                                } else {
                                    $content .= '""';
                                }
                                if ($j < ($fields_amount - 1)) {
                                    $content .= ',';
                                }
                            }
                            $content .= ")";
                            //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                            if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                                $content .= ";";
                            } else {
                                $content .= ",";
                            }
                            $st_counter = $st_counter + 1;
                        }
                    }
                    $content .= "\n\n\n";
                }
                $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
                $backup_name = $backup_name ? $backup_name : $db . '_' . $host . '_(' . date('H-i-s') . '_' . date('d-m-Y') . ').sql';
                ob_get_clean();
                header('Content-Type: application/octet-stream');
                header("Content-Transfer-Encoding: Binary");
                header('Content-Length: ' . (function_exists('mb_strlen') ? mb_strlen($content, '8bit') : strlen($content)));
                header("Content-disposition: attachment; filename=\"" . $backup_name . "\"");
                echo $content;
                exit;
            }
            /* Invoke Export Function */
            if (EXPORT_DATABASE("$remote_host", "$remote_user", "$remote_password", "$remote_database")) {
                $success = "Database exported";
            } else {
                $err  =  "Failed, please try again";
            }
        }
    }
}

/* Sync Scripts */
if (isset($_POST['Settings_Synch_Local_db'])) {
    
}
