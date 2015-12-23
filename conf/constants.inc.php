<?php
   
	define('SITE_TITLE', "Website");
	define('SITE_TITLE_ADMIN', "Administrator Panel");
	/* define('SITE_ADMIN_EMAIL', "info@americancarcentrale.com"); */
//	define('SITE_ADMIN_EMAIL', "sylc.corp@gmail.com");
//define('SITE_ADMIN_EMAIL', "ashley.damon999@gmail.com");
	define('DEFAULT_DATE_FORMAT', "d-M-Y");

	# ----------------------------------------------------------------------------------------------------
	# IMAGE FOLDER CONSTANTS
	# ----------------------------------------------------------------------------------------------------

	define('IMAGE_RELATIVE_PATH', "/images");
	define('IMAGE_DIR', LIST_ROOT.IMAGE_RELATIVE_PATH);
	define('IMAGE_URL', DEFAULT_URL.IMAGE_RELATIVE_PATH);
    define('ADMIN_IMAGE_URL',DEFAULT_URL."/superadmin".IMAGE_RELATIVE_PATH);


	# ----------------------------------------------------------------------------------------------------
	# CONSTANTS
	# ----------------------------------------------------------------------------------------------------

	define('INCLUDES_DIR',  LIST_ROOT."/includes");
	define('CLASSES_DIR',   LIST_ROOT."/classes");
	define('FUNCTIONS_DIR', LIST_ROOT."/functions");
	define('LIST_ROOT_ADMIN',  LIST_ROOT."/superadmin");
    define('LIST_ROOT_ADMIN_INCLUDES',  LIST_ROOT."/superadmin/includes");
	define('DEFAULT_ADMIN_URL',DEFAULT_URL."/superadmin");

	# ----------------------------------------------------------------------------------------------------
	# USER ATRIBUTES
	# ----------------------------------------------------------------------------------------------------

	define('PAGING_LIMIT',10);  //Paging by default limit
	define('UPLOAD_CAR_IMAGES',  LIST_ROOT."/uploads/car");
	define('CAR_IMAGES_URL',  DEFAULT_URL."/uploads/car");
	define('UPLOAD_IMPORT_FILES',  LIST_ROOT."/uploads/import");
    //$makeConstant = array('Alfa Romeo','AMC','Aston Martin','Audi','Bentley','BMW','Buick','Cadillac','Chevrolet','Chrysler','Datsun','DeLorean','De Tomaso','DeSoto','Dodge','Excalibur','Ferrari','Fiat','Ford','GMC','Jaguar','Jeep','Lamborghini','Lincoln','Maserati','McLaren','Mercury','Mercedes-Benz','Nissan','Oldsmobile','Plymouth','Pontiac','Porsche','Ram','Replica & Kit Makes','Rolls-Royce','Shelby','Studebaker','Triumph','TVR','Volkswagen','Willys','Zimmer');
    $makeConstant = array(5340 => 'Alfa Romeo',180046 => 'AMC',157054 => 'Aston Martin',6002 => 'Audi',157059 => 'Bentley',6006 => 'BMW',6135 => 'Buick',5347 => 'Cadillac',5346 => 'Chevrolet',5351 => 'Chrysler',6186 => 'Datsun',179864 => 'De Tomaso',31830 => 'DeLorean',6190 => 'DeSoto',6191 => 'Dodge',6211 => 'Ferrari',175886 => 'Fiat',6010 => 'Ford',6243 => 'GMC',6272 => 'Jaguar',6279 => 'Jeep',157067 => 'Lamborghini',6302 => 'Lincoln',162313 => 'Maserati',179666 => 'McLaren',6311 => 'Mercedes-Benz',5363 => 'Mercury',6371 => 'Nissan',6372 => 'Oldsmobile',6376 => 'Plymouth',6377 => 'Pontiac',6013 => 'Porsche',171998 => 'Ram',157071 => 'Rolls-Royce',6465 => 'Shelby',6466 => 'Studebaker',6449 => 'Triumph',6018 => 'Volkswagen',6470 => 'Willys',7251 => 'Replica/Kit Makes');
    define('MAKE_LIST',  serialize($makeConstant));
