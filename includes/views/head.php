<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300italic,400italic,500,300,500italic,700,700italic' rel='stylesheet' type='text/css'>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php
                if(isset($car_meta_values) && count($car_meta_values) > 0){
                    echo $dataMeta ='<meta name="description" content="'.$car_meta_values['description'].'" /><title>'.$car_meta_values['title'].'</title>';
                }
                else{
                    $mainHandle = new Handle();
                    echo $mainHandle->metaData();
                } 
            ?>
            <title>SYL Corporation</title>
            <!--scripts-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/jquery.validate.min.js"></script>    
            <!--Search scripts-->
            <!-- Bootstrap -->
            <link href="<?php echo DEFAULT_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/animate.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/font-awesome.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/style.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/colorbox.css" rel="stylesheet">
            <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

            <!--[if lt IE 9]-->
            <script src="<?php echo DEFAULT_URL; ?>/js/html5shiv.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/respond.min.js"></script>          
            <!--<script src="< ?php echo DEFAULT_URL; ?>/js/Modernizr.js"></script>-->
            <!--[endif]-->
            <script src="<?php echo DEFAULT_URL; ?>/js/youtube_function.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/functions.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/bootstrap.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/style.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/wow.min.js"></script>
            <script>
                new WOW().init();
            </script>
            <script>
                $(document).ready(function(){
                    $(".inlinelog").colorbox({inline:true, width:"40%",height:'400'});
                    $(".inlinedetail").colorbox({inline:true, width:"60%"});
                });
            </script>
        </head>
        <body>
            <?php 
                $unique_id = md5($_SERVER['REMOTE_PORT'].$_SERVER['REMOTE_ADDR'].time()); 
                if(!isset($_SESSION['unique_id'])){
                    $_SESSION['unique_id'][] = $unique_id;
                }
            ?>
