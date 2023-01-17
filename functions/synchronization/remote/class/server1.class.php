<?php
/*
 *   Crafted On Tue Jan 17 2023
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


@include("includes/config.php");
class server1
{

	public function __construct()
	{
		$this->dbconnection();
	}

	private function dbconnection()
	{
		$this->con = mysqli_connect(HOST, DBUSER, DBPASSWORD, DBNAME) or mysqli_connect_error();
	}

	public function getdbupdate()
	{
		$table_list = $this->table_list();

		if (count($table_list) > 0) {
			foreach ($table_list as $key => $table_name) {
				$response_array['data'][$table_name] = $this->synch_table_data($table_name);
			}
			$response_array['status'] = "success";
			$response_array['message'] = "Database synchronization initiated.";

			return $response_array;
			exit;
		} else {
			$response_array['status'] = "fail";
			$response_array['message'] = "No Tables Found.";
			$response_array['data'] = array();
			return $response_array;
			exit;
		}
	}

	private function table_list()
	{
		$table_query = mysqli_query($this->con, "SHOW TABLES");
		$table_array = array();

		if (mysqli_num_rows($table_query) > 0) {
			while ($table_query_data = mysqli_fetch_assoc($table_query)) {
				$table_array[] = $table_query_data['Tables_in_' . DBNAME];
			}
		}
		return $table_array;
	}

	private function synch_table_data($table_name)
	{
		$table_check_query = mysqli_query($this->con, "show create table `" . $table_name . "`");
		if (mysqli_num_rows($table_check_query) > 0) {
			$table_structure_string = mysqli_fetch_assoc($table_check_query);
			$table_structure_string = $table_structure_string['Create Table'];
			$table_structure_string = str_replace("CREATE TABLE", "CREATE TABLE IF NOT EXISTS", $table_structure_string);

			$post_data['table_name'] = $table_name;
			$post_data['table_structure'] = $table_structure_string;
			$table_query = mysqli_query($this->con, "select * from `" . $table_name . "`");
			if (mysqli_num_rows($table_query) > 0) {
				while ($table_data = mysqli_fetch_assoc($table_query)) {
					$post_data['table_data'][] = $table_data;
				}
			}
			//SYNC DATA TO LIVE SERVER
			$ch = curl_init(SYNC_URL);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
			// execute!
			$response = curl_exec($ch);
			// close the connection, release resources used
			curl_close($ch);

			return $response;
		} else {
			return 'Table Structure Not Found.';
		}
	}

	public function __destruct()
	{
		mysqli_close($this->con);
	}
}
