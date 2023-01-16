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

$server_check_version = '1.0.4';
$start_time = microtime(TRUE);

$operating_system = PHP_OS_FAMILY;

if ($operating_system === 'Windows') {
    // Win CPU
    $wmi = new COM('WinMgmts:\\\\.');
    $cpus = $wmi->InstancesOf('Win32_Processor');
    $cpuload = 0;
    $cpu_count = 0;
    foreach ($cpus as $key => $cpu) {
        $cpuload += $cpu->LoadPercentage;
        $cpu_count++;
    }
    // WIN MEM
    $res = $wmi->ExecQuery('SELECT FreePhysicalMemory,FreeVirtualMemory,TotalSwapSpaceSize,TotalVirtualMemorySize,TotalVisibleMemorySize FROM Win32_OperatingSystem');
    $mem = $res->ItemIndex(0);
    $memtotal = round($mem->TotalVisibleMemorySize / 1000000, 2);
    $memavailable = round($mem->FreePhysicalMemory / 1000000, 2);
    $memused = round($memtotal - $memavailable, 2);
    // WIN CONNECTIONS
    $connections = shell_exec('netstat -nt | findstr :80 | findstr ESTABLISHED | find /C /V ""');
    $totalconnections = shell_exec('netstat -nt | findstr :80 | find /C /V ""');
} else {
    // Linux CPU
    $load = sys_getloadavg();
    $cpuload = $load[0];
    $cpu_count = shell_exec('nproc');
    // Linux MEM
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem, function ($value) {
        return ($value !== null && $value !== false && $value !== '');
    }); // removes nulls from array
    $mem = array_merge($mem); // puts arrays back to [0],[1],[2] after 
    $memtotal = round($mem[1] / 1000000, 2);
    $memused = round($mem[2] / 1000000, 2);
    $memfree = round($mem[3] / 1000000, 2);
    $memshared = round($mem[4] / 1000000, 2);
    $memcached = round($mem[5] / 1000000, 2);
    $memavailable = round($mem[6] / 1000000, 2);
    // Linux Connections
    $connections = `netstat -ntu | grep :80 | grep ESTABLISHED | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;
    $totalconnections = `netstat -ntu | grep :80 | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;
}

//$memusage = round(($memavailable/$memtotal)*100);
$memusage = round(($memused / $memtotal) * 100);


$phpload = round(memory_get_usage() / 1000000, 2);

$diskfree = round(disk_free_space(".") / 1000000000);
$disktotal = round(disk_total_space(".") / 1000000000);
$diskused = round($disktotal - $diskfree);

$diskusage = round($diskused / $disktotal * 100);

if ($memusage > 85 || $cpuload > 85 || $diskusage > 85) {
    $trafficlight = 'red';
} elseif ($memusage > 50 || $cpuload > 50 || $diskusage > 50) {
    $trafficlight = 'orange';
} else {
    $trafficlight = '#2F2';
}

$end_time = microtime(TRUE);
$time_taken = $end_time - $start_time;
$total_time = round($time_taken, 4);

// use servercheck.php?json=1
if (isset($_GET['json'])) {
    echo '{"ram":' . $memusage . ',"cpu":' . $cpuload . ',"disk":' . $diskusage . ',"connections":' . $totalconnections . '}';
    exit;
}
