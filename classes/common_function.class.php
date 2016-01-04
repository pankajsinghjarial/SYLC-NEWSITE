<?php
//Added bY Kapil Verma 20110804


class commonFunction extends utility{
	
	var $stateTblName = "states";
	var $countryTblName = "countries";
	var $categoryTblName = "categories";
	
	//Constructor defined
	public function commonFunction(){}

/* State Related Function Start */
		/*****************************************
		*                                        *
		* Function to get All states from table  *
		*              Kapil Verma               *
		*****************************************/
		function getStates(){
			 global $db;
	
			 $sqlQuery = $this->am_createSelectAllQuery($this->stateTblName,'1=1','state');

			 $resultState = $db->execute($sqlQuery); 					 
			 return $resultState;

		}
	
		/********************************************
		*                                           *
		* Function to get State Name from table  *
		*           Kapil Verma                     *
		********************************************/
		
		function getStateName($id){
			global $db;
			$sqlQuery = $this->am_createSelectAllQuery($this->stateTblName,'id = '.$id);
			$resultStateName = $db->execute($sqlQuery);
			$result = $db->fetchNextObject($resultStateName);
			return $result->state;
		}
/* Country Related Function Start */
		/********************************************
		*                                           *
		* Function to get All countries from table  *
		*           Kapil Verma                     *
		********************************************/
		function getCountries(){
			 global $db;
	
			 $sqlQuery = $this->am_createSelectAllQuery($this->countryTblName,'1=1','name');

			 $resultCountry = $db->execute($sqlQuery); 					 
			 return $resultCountry;

		}
		

		/********************************************
		*                                           *
		* Function to get Country Name from table  *
		*           Kapil Verma                     *
		********************************************/
		
		function getCountryName($id){
			global $db;
			$sqlQuery = $this->am_createSelectAllQuery($this->countryTblName,'id = '.$id);
			$resultCountryName = $db->execute($sqlQuery);
			$result = $db->fetchNextObject($resultCountryName);
			return $result->name;
		}


/* Category Related Function Start */
		/********************************************
		*                                           *
		* Function to get Allcategories from table  *
		*           Kapil Verma                     *
		********************************************/
		function getCategories(){
			 global $db;
	
			 $sqlQuery = $this->am_createSelectAllQuery($this->categoryTblName,'1=1','category_name');

			 $resultCategory = $db->execute($sqlQuery); 					 
			 return $resultCategory;

		}
		
/*----------------------------spam checking code to stop unwanted spam-2----------------------------*/				
		function spam_checker($name, $email, $message)
		{
				/******** START OF CONFIG SECTION *******/
		
				// Select if you want to check form for standard spam text
				  $SpamCheck = "Y"; // Y or N
				  $SpamReplaceText = "*content removed*";
				  
				// Error message prited if spam form attack found
				$SpamErrorMessage = "<p align=\"center\"><font color=\"red\">Malicious code content detected.
				</font><br><b>Your IP Number of <b>".getenv("REMOTE_ADDR")."</b> has been logged.</b></p>";
				/******** END OF CONFIG SECTION *******/
				
				if ($SpamCheck == "Y") {                                    
				// Check for Website URL's in the form input boxes as if we block website URLs from the form,
				// then this will stop the spammers wastignt ime sending emails
				if (preg_match("/http/i", "$name")) {echo "$SpamErrorMessage"; exit();} 
				if (preg_match("/http/i", "$email")) {echo "$SpamErrorMessage"; exit();} 
				if (preg_match("/http/i", "$message")) {echo "$SpamErrorMessage"; exit();} 
				
				// Patterm match search to strip out the invalid charcaters, this prevents the mail injection spammer 
				  $pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; // build the pattern match string 
											
				  $name = preg_replace($pattern, "", $name); 
				  $email = preg_replace($pattern, "", $email); 
				  $message = preg_replace($pattern, "", $message); 
				
				// Check for the injected headers from the spammer attempt 
				// This will replace the injection attempt text with the string you have set in the above config section
				  $find = array("/bcc\:/i","/Content\-Type\:/i","/cc\:/i","/to\:/i"); 
				  $email = preg_replace($find, "$SpamReplaceText", $email); 
				  $name = preg_replace($find, "$SpamReplaceText", $name); 
				  $message = preg_replace($find, "$SpamReplaceText", $message); 
				  
				// Check to see if the fields contain any content we want to ban
				 if(stristr($name, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				 if(stristr($message, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				 
				 // Do a check on the send email and subject text
				 if(stristr($sendto, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				 if(stristr($subject, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				}
				return 1;

		}
/*---------------------------------------------------------------------------------------------*/		

		/********************************************
		*                                           *
		* Function to get substring of string		  *
		*          						             *
		********************************************/
		
		function getSubstring($string, $endlength = 200, $endString = '...') {
			
			$newString = substr(strip_tags($string), 0 , $endlength);
			if (strlen($string) > $endlength) {
				$newString .= $endString;
			}
			return $newString;
		}

/**
 * Create a web friendly URL slug from a string.
 *
 * @param string $str
 * @param array $options
 * @return string
 */
function url_slug($str, $options = array()) {
	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);
	
	// Merge options
	$options = array_merge($defaults, $options);
	
	$char_map = array(
		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
		'ß' => 'ss', 
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
		'ÿ' => 'y',

		// Latin symbols
		'©' => '(c)',

		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 

		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',

		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
		'Ž' => 'Z', 
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z', 

		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
		'Ż' => 'Z', 
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',

		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	
	// Make custom replacements
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	
	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	
	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	
	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	
	// Truncate slug to max. characters
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	
	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);
	
	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}


}
		
	
		
		
?>
