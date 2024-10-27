<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | <?= $page_name; ?></title>
  <link rel="icon" type="image/x-icon" href=" <?= helperFunction::url("assets\images\logo.png"); ?>" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= helperFunction::adminUrl("assets/plugins/fontawesome-free/css/all.min.css"); ?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= helperFunction::adminUrl("assets/dist/css/adminlte.min.css"); ?>">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">