<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>prometheusAI - Your Personal Assistant.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <link href="../public/css/vendor.min.css" rel="stylesheet" />
    <link href="../public/css/app.min.css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../public/js/noty/noty.css">
    <link rel="stylesheet" href="../public/js/noty/themes/bootstrap-v4.css">
    <link rel="stylesheet" href="../public/js/noty/themes/light.css">
    <link rel="stylesheet" href="../public/js/noty/themes/metroui.css">
    <link rel="stylesheet" href="../public/js/noty/themes/mint.css">
    <link rel="stylesheet" href="../public/js/noty/themes/nest.css">
    <link rel="stylesheet" href="../public/js/noty/themes/relax.css">
    <link rel="stylesheet" href="../public/js/noty/themes/semanticui.css">
    <link rel="stylesheet" href="../public/js/noty/themes/sunset.css">
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['err'])) {
        $err = $_SESSION['err'];
        unset($_SESSION['err']);
    }
    ?>
</head>