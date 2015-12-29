<?php
class getEntity
{
	public $version = 849;
	public $devid = "E69WP8Z16P996R8H2K1EWU7LC2F4P4";
	
	public $appid = "francois-1656-442d-bf2d-37b84676c2fb";
	public $certid = "2f56d2cd-9d4b-45a5-8945-67c432f53d29";
	public $siteid = 0;
	public $callname = "GetCategories";
	public $accesToken="AgAAAA**AQAAAA**aAAAAA**fqSbVQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AGkISjAJWBpg6dj6x9nY+seQ**An0BAA**AAMAAA**F5lNYkkTF5+eh9ORJHXXaAi0kOFTeYMNzeVxybYeVyTcvJWc8bn4auZqxUK25zO8gqfChFLU1b3UbRcgJmhoQcVqb0L7rmNpFctACptDN7zUw+iv9ZLeePmxUFivtc5KUtPa7XLYKF4khJc7l5MWBwtzGC7+QKPWNRBoccYnpz5X6n7KHymsf1sH00toTpSczFBzQGFQcP65pyioz45/QQ//8f90jOyFXs60nR0RGHItNnwjjfQy/J2U6AhXSorLl3jOhqJhMErkNrmzkv9hjTYlpVoWhlJWGz93O5YKzneDW3h/pgikw7taeC63EUNCMHqM5eP16e+o2iOUFJ+AhvN0t4joK8/7JLuhUggOJLDQFvp9T5wzRMSmhhPobmI/ABfN0EgxFbiNb/9hDelf9HotFt2MvCsoupqVzat3Kz+hGWlovE+qieoKrQOzSi8Rzm/DTNBEequJtPd7MOSX/boW0Y/Hl0hnyzPoszj6wCepHtSilZrLHL0RO3+9ocSmmTJKgi038+oIJS4wC81YP0bTBReu3HHM9/cb5b457JJZ0TSo/mX9Mv+tPfrsWmzo4huyXspp3KdjeaTOvn+IzfiOekrE3JDRi7aPUFgY00A/gpQTkT1bgabdIm9V86zJVXvRDJXfa7vp2nCaA2BuQzJF2RLIoW6CYDnOV7oLJsYRo7QKRaCY6S8rDmiJTgrd99zZSusNYldBCJuFAj4g0abmEmiJr2aCKEtL5wFb9UDNWM7v0J2IELjzAf+p0dF1";
	public $xml = '';
	public $CategorySiteID = 100;
	public $LevelLimit;
	public $CategoryParent;
	
	
	public $headers='';
	
	
	public function setValues($CategoryParent, $LevelLimit){
		
		$this->CategoryParent = $CategoryParent;
		$this->LevelLimit = $LevelLimit;
		$this->xml = '<?xml version="1.0" encoding="utf-8"?>
					<GetCategoriesRequest xmlns="urn:ebay:apis:eBLBaseComponents">
						<RequesterCredentials>
							<eBayAuthToken>'.$this->accesToken.'</eBayAuthToken>
						</RequesterCredentials>
						<CategoryParent>'.$this->CategoryParent.'</CategoryParent>
						<LevelLimit>'.$this->LevelLimit.'</LevelLimit>
						 <ViewAllNodes>true</ViewAllNodes>
						<CategorySiteID>'.$this->CategorySiteID.'</CategorySiteID>
						<DetailLevel>ReturnAll</DetailLevel>
						</GetCategoriesRequest>';
								
		
		$this->headers =	
				array('X-EBAY-API-COMPATIBILITY-LEVEL: '.$this->version,
					  'X-EBAY-API-DEV-NAME: '.$this->devid,
					  'X-EBAY-API-APP-NAME: '.$this->appid,
					  'X-EBAY-API-CERT-NAME: '.$this->certid,
					  'X-EBAY-API-CALL-NAME: '.$this->callname,
					  'X-EBAY-API-SITEID: '.$this->siteid);
	
	}
	
	
	
	public function getEntityOutput($CategoryParent, $LevelLimit){
		
				$this->setValues($CategoryParent, $LevelLimit);
				
				$ch = curl_init("https://api.ebay.com/ws/api.dll?siteid=".$this->siteid);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $this->xml);
				
				$output = curl_exec($ch);
				
				curl_close($ch);

				$res =  simplexml_load_string($output);
				$Categories = $res->CategoryArray->Category; 
				$IdsNames = array();
				foreach($Categories as $key=>$val){
					$catID  = (string)$val->CategoryID;
					$catName = (string)$val->CategoryName;
					$IdsNames[$catID] = $catName;
				}
				unset($IdsNames[$CategoryParent]);
				//unset($IdsNames['177131']);
				//echo "<pre>";
				return $IdsNames;
				
				
		
	}
	
	
	
}

	
	
?>
