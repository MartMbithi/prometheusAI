<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Financial AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../public/css/vendor.min.css" rel="stylesheet" />
    <link href="../public/css/app.min.css" rel="stylesheet" />
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