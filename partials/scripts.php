<script src="../public/js/jquery/jquery.min.js"></script>
<!-- Plug In -->
<script src="../public/js/plugin.js"></script>
<!-- Application Scripts -->
<script src="../public/js/scripts.js"></script>
<!-- Mojs -->
<script src="https://cdn.jsdelivr.net/npm/@mojs/core"></script>
<!-- Noty -->
<script src="../public/js/noty/noty.js"></script>
<!-- Custom Scripts -->
<script>
    /* Prevent Double Submissions */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    /* Inifinite Scroll On Posts */
    $(document).ready(function() {
        windowOnScroll();
    });

    function windowOnScroll() {
        $(window).on("scroll", function(e) {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                if ($(".post-item").length < $("#total_count").val()) {
                    var lastId = $(".post-item:last").attr("id");
                    getMoreData(lastId);
                }
            }
        });
    }

    function getMoreData(lastId) {
        $(window).off("scroll");
        $.ajax({
            url: 'get_more_posts.php?lastId=' + lastId,
            type: "get",
            beforeSend: function() {
                $('.ajax-loader').show();
            },
            success: function(data) {
                setTimeout(function() {
                    $('.ajax-loader').hide();
                    $("#post-list").append(data);
                    windowOnScroll();
                }, 1000);
            }
        });
    }

    /* Filter Members */
    function FilterFunction() {
        let input = document.getElementById('Member_Search').value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('Member_Details');
        /* Perform Magic Here */
        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else {
                x[i].style.display = "";
            }
        }
    }


    setInterval(function() {
        pushNotify();
    }, 1800000);

    function pushNotify() {
        if (!("Notification" in window)) {
            // checking if the user's browser supports web push Notification
            alert("Web browser does not support desktop notification");
        }
        if (Notification.permission !== "granted")
            Notification.requestPermission();
        else {
            $.ajax({
                url: "../functions/push_notifications.php",
                type: "POST",
                success: function(data, textStatus, jqXHR) {
                    if ($.trim(data)) {
                        var data = jQuery.parseJSON(data);
                        console.log(data);
                        notification = createNotification(data.title, data.icon, data.body, data.url);

                        // closes the web browser notification automatically after 5 secs
                        setTimeout(function() {
                            notification.close();
                        }, 5000);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {}
            });
        }
    };

    function createNotification(title, icon, body, url) {
        var notification = new Notification(title, {
            icon: icon,
            body: body,
        });
        // url that needs to be opened on clicking the notification
        // finally everything boils down to click and visits right
        notification.onclick = function() {
            window.open(url);
        };
        return notification;
    }
</script>
<!-- Alerts -->
<?php include('alerts.php'); ?>