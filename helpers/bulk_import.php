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


use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


if (isset($_POST['Bulk_Import_Asset'])) {


    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    /* Where Magic Happens */
    if (in_array($_FILES["assets_bulk_import_file"]["type"], $allowedFileType)) {
        $targetPath = '../storage/bulk_uploads/' . 'Assets_' . time() . '_' . $_FILES['assets_bulk_import_file']['name'];
        move_uploaded_file($_FILES['assets_bulk_import_file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i++) {

            $asset_name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $asset_name = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][0]);
            }

            $asset_cost = "";
            if (isset($spreadSheetAry[$i][1])) {
                $asset_cost = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][1]);
            }

            $asset_date_purchased = "";
            if (isset($spreadSheetAry[$i][2])) {
                $asset_date_purchased = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][2]);
            }

            $asset_status = "";
            if (isset($spreadSheetAry[$i][3])) {
                $asset_status = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][3]);
            }

            $asset_details = "";
            if (isset($spreadSheetAry[$i][4])) {
                $asset_details = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][4]);
            }

            $asset_category_id = mysqli_real_escape_string($mysqli, $_POST['asset_category_id']);


            if (!empty($asset_name) || !empty($asset_category_id) || !empty($asset_cost)) {
                /* Persist */
                $add_sql = "INSERT INTO assets(asset_category_id, asset_name, asset_details, asset_cost, asset_date_purchased, asset_status)
                VALUES('{$asset_category_id}', '{$asset_name}', '{$asset_details}', '{$asset_cost}', '{$asset_date_purchased}', '{$asset_status}')";

                if (mysqli_query($mysqli, $add_sql)) {
                    $success = "Asset added";
                } else {
                    $err = "Failed, please try again";
                }
            } else {
                $info = "Kindly fill all values";
            }
        }
    } else {
        $info = "Invalid file type. please upload excel file.";
    }
}
