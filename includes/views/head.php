<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <!--<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300italic,400italic,500,300,500italic,700,700italic' rel='stylesheet' type='text/css'>-->
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
            <link rel="shortcut icon" href="<?php echo DEFAULT_URL; ?>/images/favicon.ico" type="image/x-icon">
            <title>SYL Corporation</title>
            <!--scripts-->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
           <!--  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>-->
            <script src="<?php echo DEFAULT_URL; ?>/js/jquery.validate.min.js"></script>    
            <!--Search scripts-->
            <!-- Bootstrap -->
            <link href="<?php echo DEFAULT_URL; ?>/css/font/fontcabin.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/font/fontroboto.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/font/fontOswald.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/animate.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/font-awesome.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/style.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/colorbox.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/jquery-ui.css" rel="stylesheet">
            <!--<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>-->

            <!--[if lt IE 9]-->
            <script src="<?php echo DEFAULT_URL; ?>/js/html5shiv.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/respond.min.js"></script>          
            <!--<script src="< ?php echo DEFAULT_URL; ?>/js/Modernizr.js"></script>-->
            <!--[endif]-->
            
            
            <script src="<?php echo DEFAULT_URL; ?>/js/functions.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/jquery.colorbox.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/bootstrap.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/style.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/wow.min.js"></script>
			<script src="<?php echo DEFAULT_URL; ?>/js/jquery.validate.min.js"></script>
			<script src="<?php echo DEFAULT_URL; ?>/js/validation.js"></script>
			<script src="<?php echo DEFAULT_URL; ?>/js/jquery-ui.min.js"></script>
			<!-- Add fancyBox -->
			<!-- Add jQuery library -->
<!-- Add jQuery library -->
	
	<!-- Add mousewheel plugin (this is optional) -->
	<!--<script type="text/javascript" src="/js/jquery.mousewheel-3.0.6.pack.js"></script>-->

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/js/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="/js/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="/js/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	
	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="/js/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox-media')
			.attr('rel', 'media-gallery')
			.fancybox({
				openEffect : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',

				arrows : false,
				helpers : {
					media : {},
					buttons : {},
					
				}
			});
		
		
		$('.fancybox-media-youtube').fancybox({
				openEffect : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',

				arrows : false,
				helpers : {
					media : {},
					buttons : {
					tpl:'',	
					}
				}
			});
			/*
			$('.fancybox-media-video').fancybox({
						openEffect : 'none',
						closeEffect : 'none',
						prevEffect : 'none',
						nextEffect : 'none',

						arrows : false,
						
						afterLoad: function () {
							
								alert($(this).attr('class'));
						}
					});
			*/
			
			
    /*
			$(".fancybox-media-video").click(function(){
				
				
				var Id = $(this).attr("id");
				var video = $(this).attr("rel");
				var image = $(this).attr('data-thumb');
				
				
				 $(this).fancybox({
						openEffect : 'none',
						closeEffect : 'none',
						prevEffect : 'none',
						nextEffect : 'none',

						arrows : false,
						
						beforeLoad: function () {
								
								
								jwplayer("vid"+Id).setup({
									file: video,
									image:image,
									width: '600px',
									height:'400px'			
								});
								
								
						}
					});

				
				
			});
		*/	
			/*
			
			
			$(".fancybox-media-video").fancybox({
			fitToView: false, // to show videos in their own size
			content: '<span></span>', // create temp content
			scrolling: 'no', // don't show scrolling bars in fancybox
			afterLoad: function () {
			  
			  
			  // get dimensions from data attributes
			  var $width = $(this.element).data('width'); 
			  var $height = $(this.element).data('height');
			  // replace temp content
			  this.content = "<embed src='../jwplayer/jwplayer.flash.swf?file=" + this.href + "&autostart=true&amp;wmode=opaque' type='application/x-shockwave-flash' width='" + $width + "' height='" + $height + "'></embed>"; 

			this.content ="<div id='Fancybox-video' class='abc'></div>"; //return false;
			
			alert($("#Fancybox-video").attr('class'));
			
			jwplayer("Fancybox-video").setup({
							file: this.href,
							width: '400px',
							height:'300px'			
						});
			
			}
		  });
		  */
		  
		  });
	</script>
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
