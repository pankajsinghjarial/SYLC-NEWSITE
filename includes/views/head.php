<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if(isset($car_meta_values) && count($car_meta_values) > 0){
        echo $dataMeta ='<meta name="description" content="'.$car_meta_values['description'].'" />
                        <title>'.$car_meta_values['title'].'</title>';
    }
    else{
        $mainHandle = new Handle();
        echo $mainHandle->metaData();
    } ?>
    <title>SYL Corporation</title>

    <!-- Bootstrap -->
    <link href="<?php echo DEFAULT_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo DEFAULT_URL; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo DEFAULT_URL; ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo DEFAULT_URL; ?>/css/style.css" rel="stylesheet">

    <!--[if lt IE 9]-->
      <script src="<?php echo DEFAULT_URL; ?>/js/html5shiv.min.js"></script>
      <script src="<?php echo DEFAULT_URL; ?>/js/respond.min.js"></script>
      <!--<script src="< ?php echo DEFAULT_URL; ?>/js/Modernizr.js"></script>-->
    <!--[endif]-->

    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
  </head>

  <body>
    <?php 
    $unique_id = md5($_SERVER['REMOTE_PORT'].$_SERVER['REMOTE_ADDR'].time()); 
    if(!isset($_SESSION['unique_id'])){
       $_SESSION['unique_id'][] = $unique_id;
    }
    ?>
