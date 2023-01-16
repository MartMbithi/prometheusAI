
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ServerCheck</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html {
            background: #FFF;
        }

        body {
            background: #FFF;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        #container {
            width: 320px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #EFEFEF;
            border-radius: 5px;
            box-shadow: 0 0 5px #AAA;
            -webkit-box-shadow: 0 0 5px #AAA;
            -moz-box-shadow: 0 0 5px #AAA;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        .description {
            font-weight: bold;
        }

        #trafficlight {
            float: right;
            margin-top: 15px;
            width: 50px;
            height: 50px;
            border-radius: 50px;
            background: <?php echo $trafficlight; ?>;
            border: 3px solid #333;
        }

        #details {
            font-size: 0.8em;
        }

        hr {
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0));
        }

        .big {
            font-size: 1.2em;
        }

        .footer {
            font-size: 0.5em;
            color: #888;
            text-align: center;
        }

        .footer a {
            color: #888;
        }

        .footer a:visited {
            color: #888;
        }

        .dark {
            background: #000;
            filter: invert(1) hue-rotate(180deg);
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="trafficlight" class="nodark"></div>

        <p><span class="description big">🌡️ RAM Usage:</span> <span class="result big"><?php echo $memusage; ?>%</span></p>
        <p><span class="description big">🖥️ CPU Usage: </span> <span class="result big"><?php echo $cpuload; ?>%</span></p>
        <p><span class="description">💽 Hard Disk Usage: </span> <span class="result"><?php echo $diskusage; ?>%</span></p>
        <p><span class="description">🖧 Established Connections: </span> <span class="result"><?php echo $connections; ?></span></p>
        <p><span class="description">🖧 Total Connections: </span> <span class="result"><?php echo $totalconnections; ?></span></p>
        <hr>
        <p><span class="description">🖥️ CPU Threads:</span> <span class="result"><?php echo $cpu_count; ?></span></p>
        <hr>
        <p><span class="description">🌡️ RAM Total:</span> <span class="result"><?php echo $memtotal; ?> GB</span></p>
        <p><span class="description">🌡️ RAM Used:</span> <span class="result"><?php echo $memused; ?> GB</span></p>
        <p><span class="description">🌡️ RAM Available:</span> <span class="result"><?php echo $memavailable; ?> GB</span></p>
        <hr>
        <p><span class="description">💽 Hard Disk Free:</span> <span class="result"><?php echo $diskfree; ?> GB</span></p>
        <p><span class="description">💽 Hard Disk Used:</span> <span class="result"><?php echo $diskused; ?> GB</span></p>
        <p><span class="description">💽 Hard Disk Total:</span> <span class="result"><?php echo $disktotal; ?> GB</span></p>
        <hr>
        <div id="details">
            <p><span class="description">📟 Server Name: </span> <span class="result"><?php echo $_SERVER['SERVER_NAME']; ?></span></p>
            <p><span class="description">💻 Server Addr: </span> <span class="result"><?php echo $_SERVER['SERVER_ADDR']; ?></span></p>
            <p><span class="description">🌀 PHP Version: </span> <span class="result"><?php echo phpversion(); ?></span></p>
            <p><span class="description">🏋️ PHP Load: </span> <span class="result"><?php echo $phpload; ?> GB</span></p>

            <p><span class="description">⏱️ Load Time: </span> <span class="result"><?php echo $total_time; ?> sec</span></p>
        </div>
    </div>
    <footer>
        <div class="footer">
            <a href="https://github.com/jamesbachini/Server-Check-PHP">Server Check PHP</a> v <?php echo $server_check_version; ?> |
            Built by <a href="https://jamesbachini.com">James Bachini</a> | <a href="?json=1">JSON</a> | 🌙 <a href="javascript:void(0)" onclick="toggleDarkMode();">Dark Mode</a>
        </div>
    </footer>
    <script>
        const toggleDarkMode = () => {
            if (localStorage.getItem('darkMode') && localStorage.getItem('darkMode') === 'true') {
                localStorage.setItem('darkMode', false);
            } else {
                localStorage.setItem('darkMode', true);
            }
            setDarkMode();
        }
        const setDarkMode = () => {
            if (localStorage.getItem('darkMode') && localStorage.getItem('darkMode') === 'true') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        setDarkMode();
    </script>
</body>

</html>